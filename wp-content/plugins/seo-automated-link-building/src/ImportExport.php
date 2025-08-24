<?php
/**
 * Internal Links Manager
 * Copyright (C) 2021 webraketen GmbH
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You can read the GNU General Public License here: <https://www.gnu.org/licenses/>.
 * For questions related to this program contact post@webraketen-media.de
 */

namespace SeoAutomatedLinkBuilding;

class ImportExport {

	/**
	 * Error messages
	 * @var array
	 */
	protected static $errors = [];

    public static function importCsv($str, $mode) {
        $bom = pack('H*','EFBBBF');
        $str = preg_replace("/^$bom/", '', $str);

		// check if file is utf8 encoded
	    if (!mb_check_encoding($str, 'UTF-8')) {
		    self::$errors[] = __('<div class="error">Please provide an utf8 encoded csv file!</div>', 'seo-automated-link-building');
			return;
	    }

		$separator = '';
		$updated = 0;
        foreach(preg_split("/((\r?\n)|(\r\n?))/", $str) as $i => $line) {

			// determine separator in header line
	        if ( $i === 0 ) {
				if( str_contains( $line, ',' ) ) {
					$separator = ',';
				} else {
					$separator = ';';
				}
	        }

            $csv = str_getcsv($line, $separator);
            if($i == 0) {
                $header = $csv;
                // determine id index
                $idIndex = array_search('id', $header);
                continue;
            }
            if(empty(trim($line))) {
                continue;
            }
            $id = $csv[$idIndex];
            $link = null;
            if($mode !== 'add') {
                $link = Link::get($id);
            }
            if($link) {
                if($mode === 'addMissing') {
                    continue;
                }
            } else {
                $link = new Link();
            }
            foreach($csv as $index => $value) {
                $key = $header[$index];
                if($key === 'id') {
                    continue;
                }
                if($key === 'title') {
                    $value = sanitize_text_field($value);
                }
                if($key === 'titleattr') {
                    $value = sanitize_text_field($value);
                }
                $link->{$key} = $value;
            }
            $link->save();

			if($link::wpdb()->last_error !== '') {
				self::$errors[] = sprintf(__('<div class="error">Line %s: %s</div>', 'seo-automated-link-building'), ($i+1) ,$link::wpdb()->last_error);
			} else {
				$updated ++;
			}
        }

		if(count(self::$errors) > 0) {
			array_unshift(self::$errors, sprintf(__('<div class="success">%d lines updated / inserted</div>', 'seo-automated-link-building'), $updated));
		}
    }

    public static function importJson($str, $mode) {
        $bom = pack('H*','EFBBBF');
        $str = preg_replace("/^$bom/", '', $str);
        $data = json_decode($str, true);
        foreach($data as $d) {
            $id = $d['id'];
            $link = null;
            if($mode !== 'add') {
                $link = Link::get($id);
            }
            if($link) {
                if($mode === 'addMissing') {
                    continue;
                }
            } else {
                $link = new Link();
            }
            foreach($d as $key => $value) {
                if($key === 'id') {
                    continue;
                }
                if($key === 'title') {
                    $value = sanitize_text_field($value);
                }
                if($key === 'titleattr') {
                    $value = sanitize_text_field($value);
                }
                $link->{$key} = $value;
            }
            $link->save();
        }
    }

    public static function exportLinks(array $ids) {
        $links = Link::query()->where('id', 'in', [$ids])->get_results();

        return static::_exportCsv($links);
    }

    public static function exportAllLinksAsCsv($separator = ';') {
        $links = Link::query()->get_results();

        return static::_exportCsv($links, $separator);
    }

    public static function exportAllLinksAsJson() {
        $links = Link::query()->get_results();

        return static::_exportJson($links);
    }

    private static function _exportCsv(array $links, string $separator = ';') {
        // output up to 5MB is kept in memory, if it becomes bigger it will automatically be written to a temporary file
        $csv = fopen('php://temp/maxmemory:'. (5*1024*1024), 'r+');
        // set UTF-8 bom header
        // fprintf($csv, chr(0xEF).chr(0xBB).chr(0xBF));

        foreach($links as $index => $link) {
            if($index == 0) {
                fputcsv($csv, array_keys($link), $separator);
            }
            fputcsv($csv, array_values($link), $separator);
        }

        rewind($csv);

        // put it all in a variable
        $output = stream_get_contents($csv);

        return $output;
    }

    private static function _exportJson(array $links) {
        return json_encode($links, JSON_UNESCAPED_UNICODE);
    }

	/**
	 * @return bool
	 */
	public static function hasErrors() {
		return (count(self::$errors) > 0);
	}

	/**
	 * @return array
	 */
	public static function getErrors() {
		return self::$errors;
	}
}
