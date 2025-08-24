/**
 * バージョン判別
 */
(function (window, document, ST, undefined) {
	'use strict'

	/*!
	 * version_compare()
	 *
	 * @copyright Copyright (c) 2007-2016 Kevin van Zonneveld (https://kvz.io) and Contributors (https://locutus.io/authors)
	 * @license MIT
	 * @see [kvz/locutus: All your standard libraries will be assimilated into our JavaScript collective. Resistance is futile.]{@link https://github.com/kvz/locutus}
	 */

	/**
	 * @param {string} v1
	 * @param {string} v2
	 * @param {string} operator
	 *
	 * @returns {number|boolean|null}
	 */
	function version_compare(v1, v2, operator) {
		var i
		var x
		var compare = 0

		var vm = {
			'dev'  : -6,
			'alpha': -5,
			'a'    : -5,
			'beta' : -4,
			'b'    : -4,
			'RC'   : -3,
			'rc'   : -3,
			'#'    : -2,
			'p'    : 1,
			'pl'   : 1
		}

		var _prepVersion = function (v) {
			v = ('' + v).replace(/[_\-+]/g, '.')
			v = v.replace(/([^.\d]+)/g, '.$1.').replace(/\.{2,}/g, '.')
			return (!v.length ? [-8] : v.split('.'))
		}

		var _numVersion = function (v) {
			return !v ? 0 : (isNaN(v) ? vm[v] || -7 : parseInt(v))
		}

		v1 = _prepVersion(v1)
		v2 = _prepVersion(v2)
		x  = Math.max(v1.length, v2.length)

		for (i = 0; i < x; i++) {
			if (v1[i] === v2[i]) {
				continue
			}

			v1[i] = _numVersion(v1[i])
			v2[i] = _numVersion(v2[i])

			if (v1[i] < v2[i]) {
				compare = -1

				break
			} else if (v1[i] > v2[i]) {
				compare = 1

				break
			}
		}

		if (!operator) {
			return compare
		}

		switch (operator) {
			case '>':
			case 'gt':
				return (compare > 0)

			case '>=':
			case 'ge':
				return (compare >= 0)

			case '<=':
			case 'le':
				return (compare <= 0)

			case '===':
			case '=':
			case 'eq':
				return (compare === 0)

			case '<>':
			case '!==':
			case 'ne':
				return (compare !== 0)

			case '':
			case '<':
			case 'lt':
				return (compare < 0)

			default:
				return null
		}
	}

	/**
	 * @param {string} prefix
	 * @param {string} [ver]
	 * @param {string} [operator]
	 *
	 * @returns {boolean}
	 */
	function is(prefix, ver, operator) {
		var current_version = ST.affinger_type || '';

		prefix = prefix.toLowerCase();

		if (current_version.indexOf(prefix) === -1) {
			return false;
		}

		if (typeof ver !== 'undefined') {
			operator = operator || '==';
		} else {
			ver      = '';
			operator = operator || '>=';
		}

		return !!version_compare(current_version, prefix + ver, operator);
	}

	/**
	 * @param {string} [ver]
	 * @param {string} [operator]
	 *
	 * @returns {boolean}
	 */
	function is_ex(ver, operator) {
		return is('EX', ver, operator);
	}

	/**
	 * @param {string} [ver]
	 * @param {string} [operator]
	 *
	 * @returns {boolean}
	 */
	function is_af(ver, operator) {
		return is('AF', ver, operator);
	}

	/**
	 * @param {string} [ver]
	 * @param {string} [operator]
	 *
	 * @returns {boolean}
	 */
	function is_st(ver, operator) {
		return is('ST', ver, operator);
	}

	/**
	 * @param {string} [ex_ver]
	 * @param {string} [ex_operator]
	 * @param {string} [af_ver]
	 * @param {string} [af_operator]
	 *
	 * @returns {boolean}
	 */
	function is_ex_af(ex_ver, ex_operator, af_ver, af_operator) {
		return (is_ex(ex_ver, ex_operator) || is_af(af_ver, af_operator));
	}

	/**
	 * @returns {boolean}
	 */
	function is_biz() {
		return false;
	}

	var Version = {
		is      : is,
		is_ex   : is_ex,
		is_af   : is_af,
		is_st   : is_st,
		is_ex_af: is_ex_af,
		is_biz  : is_biz
	};

	window.ST         = window.ST || {};
	window.ST.Version = window.ST.Version || Version;
}(window, window.document, ST));
