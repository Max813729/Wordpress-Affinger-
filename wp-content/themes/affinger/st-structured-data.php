<?php
if ( ! function_exists( 'st_sd_print_json_ld' ) ) {
	function st_sd_print_json_ld() {
		$data = apply_filters( 'st_sd_structured_data', array() );

		if ( count( $data ) === 0 ) {
			return;
		}

		$json_ld = wp_json_encode( array_values( $data ), JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT );

		if ( ! $json_ld ) {
			return;
		}
		?>

		<script type="application/ld+json"><?php echo $json_ld; ?></script>

		<?php
	}
}

add_action( 'wp_footer', 'st_sd_print_json_ld' );
add_action( 'amp_wp_footer', 'st_sd_print_json_ld' );

if ( ! function_exists( '_st_sd_get_publisher_user_id' ) ) {
	/**
	 * publisher のユーザー ID を取得 (サイト管理者ウィジェットに合わせている)
	 *
	 * @return int
	 */
	function _st_sd_get_publisher_user_id() {
        $user_id = trim( (string) get_option( 'st-data437' ) );

        return ( $user_id !== '' ) ? (int) $user_id : 1;
	}
}

if ( ! function_exists( '_st_sd_get_no_image_object_data' ) ) {
	/**
	 * 画像がない場合の schema.org の ImageObject データを生成する。
	 *
	 * @return array<string, mixed>
	 */
	function _st_sd_get_no_image_object_data() {
		$attachment_url  = get_theme_file_uri( 'images/no-img.png' );
		$attachment_path = get_theme_file_path( 'images/no-img.png' );

		@list( $attachment_width, $attachment_height ) = _st_getimagesize( $attachment_path );

		$attachment_width  = ( $attachment_width ) ? $attachment_width : 300;
		$attachment_height = ( $attachment_height ) ? $attachment_height : 300;

		$thumbnail_url    = $attachment_url;
		$thumbnail_width  = $attachment_width;
		$thumbnail_height = $attachment_height;

		// ImageObject.image (Thing.image): ImageObject.
		$image_data = array(
			'@context'   => 'https://schema.org',
			'@type'      => 'ImageObject',

			// Thing.
			'url'        => $attachment_url,

			// MediaObject.
			'contentUrl' => $attachment_url,
			'height'     => $attachment_height,
			'width'      => $attachment_width,
		);

		// ImageObject.thumbnail: ImageObject.
		$thumbnail_data = array(
			'@context'   => 'https://schema.org',
			'@type'      => 'ImageObject',

			// Thing.
			'url'        => $thumbnail_url,

			// MediaObject.
			'contentUrl' => $thumbnail_url,
			'height'     => $thumbnail_height,
			'width'      => $thumbnail_width,
		);

		// ImageObject.
		$image_object_data = array(
			'@context'   => 'https://schema.org',
			'@type'      => 'ImageObject',

			// Thing.
			'image'      => $image_data,
			'url'        => $attachment_url,

			// MediaObject.
			'contentUrl' => $attachment_url,
			'height'     => $attachment_height,
			'width'      => $attachment_width,

			// ImageObject.
			'thumbnail'  => $thumbnail_data,
		);

		return $image_object_data;
	}
}

if ( ! function_exists( '_st_sd_get_attachment_image_object_data' ) ) {
	/**
	 * 添付 ID から schema.org の ImageObject データを生成する。
	 *
	 * @param int $attachment_id
	 * @param string $size
	 * @param string $thumbnail_size
	 *
	 * @return array<string, mixed>
	 */
	function _st_sd_get_attachment_image_object_data( $attachment_id, $size = 'full', $thumbnail_size = 'thumbnail' ) {
		// 画像
		$attachment     = get_post( $attachment_id );
		$attachment_src = wp_get_attachment_image_src( $attachment_id, $size );

		if ( $attachment === null || ! $attachment_src ) {
			return _st_sd_get_no_image_object_data();
		}

		list( $attachment_url, $attachment_width, $attachment_height ) = $attachment_src;

		// サムネイル
		$thumbnail_src = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
		$thumbnail_src = $thumbnail_src ? $thumbnail_src : $attachment_src;

		list( $thumbnail_url, $thumbnail_width, $thumbnail_height ) = $thumbnail_src;

		// ImageObject.image (Thing.image): ImageObject.
		$image_data = array(
			'@context'   => 'https://schema.org',
			'@type'      => 'ImageObject',

			// Thing.
			'url'        => $attachment_url,

			// MediaObject.
			'contentUrl' => $attachment_url,
			'height'     => $attachment_height,
			'width'      => $attachment_width,
		);

		// ImageObject.thumbnail: ImageObject.
		$thumbnail_data = array(
			'@context'   => 'https://schema.org',
			'@type'      => 'ImageObject',

			// Thing.
			'url'        => $thumbnail_url,

			// MediaObject.
			'contentUrl' => $thumbnail_url,
			'height'     => $thumbnail_height,
			'width'      => $thumbnail_width,
		);

		// ImageObject.
		$attachment_alt         = (string) get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
		$attachment_alt         = trim( strip_tags( $attachment_alt ) );
		$attachment_title       = trim( get_the_title( $attachment_id ) );
		$attachment_name        = ( $attachment_title !== '' ) ? $attachment_title : $attachment_alt;
		$attachment_description = apply_filters( 'the_content', $attachment->post_content );
		$attachment_description = trim( strip_tags( $attachment_description ) );
		$attachment_caption     = trim( (string) wp_get_attachment_caption( $attachment_id ) );

		// ImageObject.name (Thing.name).
		// ImageObject.image.name (Thing.name).
		// ImageObject.thumbnail.name (Thing.name).
		if ( $attachment_name !== '' ) {
			$image_data['name']        = $attachment_name;
			$thumbnail_data['name']    = $attachment_name;
			$image_object_data['name'] = $attachment_name;
		}

		// ImageObject.description (Thing.description).
		// ImageObject.image.description (Thing.description).
		// ImageObject.thumbnail.description (Thing.description).
		if ( $attachment_description !== '' ) {
			$image_data['description']        = $attachment_description;
			$thumbnail_data['description']    = $attachment_description;
			$image_object_data['description'] = $attachment_description;
		}

		// ImageObject.caption.
		// ImageObject.image.caption.
		// ImageObject.thumbnail.caption.
		if ( $attachment_caption !== '' ) {
			$image_data['caption']        = $attachment_caption;
			$thumbnail_data['caption']    = $attachment_caption;
			$image_object_data['caption'] = $attachment_caption;
		}

		$image_object_data = array(
			'@context'   => 'https://schema.org',
			'@type'      => 'ImageObject',

			// Thing.
			'image'      => $image_data,
			'url'        => $attachment_url,

			// MediaObject.
			'contentUrl' => $attachment_url,
			'height'     => $attachment_height,
			'width'      => $attachment_width,

			// ImageObject.
			'thumbnail'  => $thumbnail_data,
		);

		return $image_object_data;
	}
}

if ( ! function_exists( '_st_sd_get_guest_user_image_object_data' ) ) {
	/**
	 * ゲストユーザーの schema.org の ImageObject データを生成する。
	 *
	 * @return array<string, mixed>
	 */
	function _st_sd_get_guest_user_image_object_data( $email = null ) {
		static $AVATAR_SIZE = 96;

		$user_avatar_url = 'https://secure.gravatar.com/avatar/?s=' . $AVATAR_SIZE . '&d=mm&r=g';

		// Gravatar.
		if ( $email !== null ) {
			$user_avatar = get_avatar_data( $email, array( 'size' => $AVATAR_SIZE ) );

			if ( $user_avatar['found_avatar'] ) {
				$user_avatar_url = $user_avatar['url'];
			}
		}

		// ImageObject.image (Thing.image): ImageObject.
		$image_data = array(
			'@context'   => 'https://schema.org',
			'@type'      => 'ImageObject',

			// Thing.
			'url'        => $user_avatar_url,

			// MediaObject.
			'contentUrl' => $user_avatar_url,
			'height'     => $AVATAR_SIZE,
			'width'      => $AVATAR_SIZE,
		);

		// ImageObject.
		$image_object_data = [
			'@context'   => 'https://schema.org',
			'@type'      => 'ImageObject',

			// Thing.
			'image'      => $image_data,
			'url'        => $user_avatar_url,

			// MediaObject.
			'contentUrl' => $user_avatar_url,
			'height'     => $AVATAR_SIZE,
			'width'      => $AVATAR_SIZE,
		];

		return $image_object_data;
	}
}

if ( ! function_exists( '_st_sd_get_user_image_object_data' ) ) {
	/**
	 * ユーザー ID から schema.org の ImageObject データを生成する。
	 *
	 * @param int $user_id
	 *
	 * @return array<string, mixed>
	 */
	function _st_sd_get_user_image_object_data( $user_id ) {
		static $AVATAR_SIZE = 96;

		$user = get_userdata( $user_id );

		if ( ! $user ) {
			return _st_sd_get_no_image_object_data();
		}

		$st_author_profile    = get_theme_mod( 'st_author_profile' );
		$st_author_avatar_url = trim( (string) get_option( 'st_author_profile_avatar' ) );
		$avatar_attachment_id = attachment_url_to_postid( $st_author_avatar_url );

		// プロフィールカードのアバター
		if ( $user_id === _st_sd_get_publisher_user_id() && $st_author_profile && $st_author_avatar_url !== '' && $avatar_attachment_id !== 0 ) {
			return _st_sd_get_attachment_image_object_data( $avatar_attachment_id, 'full', 'full' );
		}

		// Gravatar
		$user_avatar = get_avatar_data( $user->ID, array( 'size' => $AVATAR_SIZE ) );

		if ( ! $user_avatar['found_avatar'] ) {
			return _st_sd_get_no_image_object_data();
		}

		$user_avatar_url = $user_avatar['url'];

		// ImageObject.image (Thing.image): ImageObject.
		$image_data = array(
			'@context'   => 'https://schema.org',
			'@type'      => 'ImageObject',

			// Thing.
			'url'        => $user_avatar_url,

			// MediaObject.
			'contentUrl' => $user_avatar_url,
			'height'     => $AVATAR_SIZE,
			'width'      => $AVATAR_SIZE,
		);

		// ImageObject.
		$image_object_data = [
			'@context'   => 'https://schema.org',
			'@type'      => 'ImageObject',

			// Thing.
			'image'      => $image_data,
			'url'        => $user_avatar_url,

			// MediaObject.
			'contentUrl' => $user_avatar_url,
			'height'     => $AVATAR_SIZE,
			'width'      => $AVATAR_SIZE,
		];

		return $image_object_data;
	}
}

if ( ! function_exists( '_st_sd_get_guest_user_person_data' ) ) {
	/**
	 * ゲストユーザー schema.org の Person データを生成する。
	 *
	 * @param string|null $name
	 * @param string|null $email
	 * @param string|null $url
	 *
	 * @return array<string, mixed>
	 */
	function _st_sd_get_guest_user_person_data( $name = null, $email = null, $url = null ) {
		// Person.
		$person_data = [
			'@context' => 'https://schema.org',
			'@type'    => 'Person',

			// Thing.
			'name'     => ( $name !== null ) ? $name : __( 'Anonymous', 'affinger' ),
		];

		// Person.url (Thins.url).
		if ( $url !== null ) {
			$person_data['url'] = $url;
		}

		// Person.image (Thing.image).
		$person_data['image'] = _st_sd_get_guest_user_image_object_data( $email );

		return $person_data;
	}
}

if ( ! function_exists( '_st_sd_get_user_person_data' ) ) {
	/**
	 * ユーザー ID から schema.org の Person データを生成する。
	 *
	 * @param int $user_id
	 *
	 * @return array<string, mixed>|null
	 */
	function _st_sd_get_user_person_data( $user_id ) {
		$user = get_userdata( $user_id );

		if ( ! $user ) {
			return null;
		}

		// Person.
		$user_description = trim( get_the_author_meta( 'description', $user->ID ) );
		$user_posts_url   = get_author_posts_url( $user->ID );

		$person_data = [
			'@context'         => 'https://schema.org',
			'@type'            => 'Person',

			// Thing.
			'mainEntityOfPage' => $user_posts_url,
			'name'             => apply_filters( 'the_author', $user->display_name ),
			'url'              => $user_posts_url,
		];

		if ( $user_description !== '' ) {
			// Person.description (Thing.description).
			$person_data['description'] = $user_description;
		}

		// アバター
		$image_object_data = _st_sd_get_user_image_object_data( $user_id );

		// Person.image (Thing.image).
		$person_data['image'] = $image_object_data;

		// Web サイト, ソーシャルプロフィール
		// Person.sameAs (Thing.sameAs)
		$same_as_data = array();
		$twitter      = trim( get_the_author_meta( 'twitter', $user_id ) );
		$facebook     = trim( get_the_author_meta( 'facebook', $user_id ) );
		$instagram    = trim( get_the_author_meta( 'instagram', $user_id ) );
		$youtube      = trim( get_the_author_meta( 'youtube', $user_id ) );
		$homepage     = trim( get_the_author_meta( 'user_url', $user_id ) );

		if ( $twitter !== '' ) {
			$same_as_data[] = $twitter;
		}

		if ( $facebook !== '' ) {
			$same_as_data[] = $facebook;
		}

		if ( $instagram !== '' ) {
			$same_as_data[] = $instagram;
		}

		if ( $youtube !== '' ) {
			$same_as_data[] = $youtube;
		}

		if ( $homepage !== '' ) {
			$same_as_data[] = $homepage;
		}

		if ( count( $same_as_data ) > 0 ) {
			$person_data['sameAs'] = $same_as_data;
		}

		return $person_data;
	}
}

if ( ! function_exists( '_st_sd_get_publisher_person_data' ) ) {
	/**
	 * schema.org の発行者 (Publisher) 用 Person データを生成する。
	 *
	 * @return array<string, mixed>|null
	 */
	function _st_sd_get_publisher_person_data() {
		$publisher_user = get_user_by( 'id', _st_sd_get_publisher_user_id() );

		if ( ! $publisher_user ) {
			return null;
		}

		return _st_sd_get_user_person_data( $publisher_user->ID );
	}
}

if ( ! function_exists( '_st_sd_get_publisher_organization_data' ) ) {
	/**
	 * schema.org の発行者 (Publisher) 用 Organization データを生成する。
	 *
	 * @return array<string, mixed>|null
	 */
	function _st_sd_get_publisher_organization_data() {
		$publisher_user = get_user_by( 'id', _st_sd_get_publisher_user_id() );

		if ( ! $publisher_user ) {
			return null;
		}

		$home_title       = trim( (string) get_option( 'st-data33' ) );
		$home_title       = ( $home_title !== '' ) ? $home_title : get_bloginfo( 'name' );
		$home_description = trim( (string) get_option( 'st-data34' ) );
		$home_description = ( $home_description !== '' ) ? $home_description : get_bloginfo( 'description' );

		// Organization.
		$organization_data = [
			'@context'    => 'https://schema.org',
			'@type'       => 'Organization',

			// Thing.
			'description' => $home_description,
			'name'        => $home_title,
			'url'         => home_url(),
		];

		// Organization.image (Thing.image).
		// Organization.logo.
		$logo_url = (string) get_option( 'st_logo_image' );
		$logo_id  = attachment_url_to_postid( $logo_url );

		if ( $logo_url !== '' && $logo_id !== 0 ) {
			$logo_image_object_data = _st_sd_get_attachment_image_object_data( $logo_id, 'full', 'full' );
		} else {
			$logo_image_object_data = _st_sd_get_no_image_object_data();
		}

		$organization_data['image'] = $logo_image_object_data;
		$organization_data['logo']  = $logo_image_object_data;

		return $organization_data;
	}
}

if ( ! function_exists( 'st_sd_website' ) ) {
	/**
	 * サイト情報 (WebSite)
	 *
	 * @param array<string, mixed> $data
	 *
	 * @return array<string, mixed>
	 */
	function st_sd_website( array $data ) {
		if ( get_option( 'st-data406' ) !== 'yes' ) {    // Webサイト情報を出力する
			return $data;
		}

		$home_title       = trim( (string) get_option( 'st-data33' ) );
		$home_title       = ( $home_title !== '' ) ? $home_title : get_bloginfo( 'name' );
		$home_description = trim( (string) get_option( 'st-data34' ) );
		$home_description = ( $home_description !== '' ) ? $home_description : get_bloginfo( 'description' );

		$website_data = array(
			'@context'    => 'https://schema.org',
			'@type'       => 'WebSite',

			// Thing.
			'description' => $home_description,
			'name'        => $home_title,
			'url'         => home_url(),
		);

		// WebSite.publisher (CreativeWork.publisher).
		$publisher_person_data = _st_sd_get_publisher_person_data();

		if ( $publisher_person_data !== null ) {
			$website_data['publisher'] = $publisher_person_data;
		}

		// ロゴ画像
		$logo_url = (string) get_option( 'st_logo_image' );
		$logo_id  = attachment_url_to_postid( $logo_url );

		if ( $logo_url !== '' && $logo_id !== 0 ) {
			$logo_image_object_data = _st_sd_get_attachment_image_object_data( $logo_id, 'full', 'full' );
		} else {
			$logo_image_object_data = _st_sd_get_no_image_object_data();
		}

		// WebSite.image: (Thing.image).
		// WebSite.thumbnailUrl (CreativeWork.thumbnailUrl).
		$website_data['image']        = $logo_image_object_data;
		$website_data['thumbnailUrl'] = $logo_image_object_data['url'];

		// WebSite.
		$data['website'] = $website_data;

		return $data;
	}
}

add_filter( 'st_sd_structured_data', 'st_sd_website' );

if ( ! function_exists( 'st_sd_singular_article' ) ) {
	/**
	 * 記事情報 (Article)
	 *
	 * @param array<string, mixed> $data
	 *
	 * @return array<string, mixed>
	 */
	function st_sd_singular_article( array $data ) {
		global $authordata;

		if ( get_option( 'st-data407' ) !== 'yes' ) {    // 投稿・固定ページで記事（著者）情報を出力する
			return $data;
		}

		if ( ! is_single() && ! is_page() ) {
			return $data;
		}

		/** @var WP_Post $post */
		$post       = get_queried_object();
		$author     = $authordata;
		$post_title = get_the_title( $post );

		if ( amp_is_amp() ) {
			remove_filter( 'post_link', 'amp_post_link', PHP_INT_MAX );
		}

		$post_canonical_url = esc_url( wp_get_canonical_url() );

		if ( amp_is_amp() ) {
			add_filter( 'post_link', 'amp_post_link', PHP_INT_MAX, 3 );
		}

		$article_data = array(
			'@context'         => 'https://schema.org',
			'@type'            => 'Article',

			// Thing.
			'description'      => trim( st_get_the_excerpt( $post ) ),
			'mainEntityOfPage' => $post_canonical_url,
			'name'             => $post_title,
			'url'              => get_the_permalink( $post ),

			// CreativeWork.
			'headline'         => $post_title,
		);

		// Article.author (CreativeWork.author).
		$author_person_data = _st_sd_get_user_person_data( $author->ID );

		if ( $author_person_data !== null ) {
			$article_data['author'] = $author_person_data;
		}

		// Article.dateModified (CreativeWork.dateModified).
		// Article.datePublished (CreativeWork.datePublished).
		if ( st_is_ver_ex() && ( get_the_date() != get_the_modified_date() ) && isset($GLOBALS['stdata592']) && $GLOBALS['stdata592'] === 'yes' ) : // 更新日を全て今日にする（自動更新）
			$article_data['dateModified'] = date( DATE_ATOM );
		else:
			$article_data['dateModified'] = get_the_modified_time( DATE_ATOM, $post );
		endif;
		$article_data['datePublished'] = get_the_time( DATE_ATOM, $post );

		// Article.image (Thing.author).
		// Article.thumbnailUrl (CreativeWork.thumbnailUrl).
		if ( has_post_thumbnail( $post ) ) {
			// Article.image (Thing.author).
			$post_thumbnail_id                = get_post_thumbnail_id( $post );
			$post_thumbnail_image_object_data = _st_sd_get_attachment_image_object_data( $post_thumbnail_id );
		} else {
			$post_thumbnail_image_object_data = _st_sd_get_no_image_object_data();
		}

		// Article.image (Thing.author).
		$article_data['image'] = $post_thumbnail_image_object_data;

		// Article.thumbnailUrl (CreativeWork.thumbnailUrl).
		$article_data['thumbnailUrl'] = $post_thumbnail_image_object_data['url'];

		// Article.publisher (CreativeWork.publisher).
		// 構造化データテストツールが Person に未対応のため Organization で代用。
		$publisher_data = _st_sd_get_publisher_organization_data();

		if ( $publisher_data !== null ) {
			$article_data['publisher'] = $publisher_data;
		}

		// Article.comment.
		$hide_comment        = ( get_option( 'st-data6' ) === 'yes' );
		$output_article_data = ( get_option( 'st-data407' ) === 'yes' );
		$output_comment_data = ( get_option( 'st-data408' ) === 'yes' );

		if ( ! $hide_comment && $output_article_data && $output_comment_data ) {
			$comment_graph_data = _st_sd_get_comment_graph_data( $post );

			if ( count( $comment_graph_data ) > 0 ) {
				$article_data['comment'] = $comment_graph_data;
			}
		}

		// Article.
		$data['singular_article'] = $article_data;

		return $data;
	}
}

add_filter( 'st_sd_structured_data', 'st_sd_singular_article' );

if ( ! function_exists( 'st_sd_profile_page' ) ) {
	/**
	 * 著者ページ (ProfilePage)
	 *
	 * @param array<string, mixed> $data
	 *
	 * @return array<string, mixed>
	 */
	function st_sd_profile_page( array $data ) {
		if ( get_option( 'st-data407' ) !== 'yes' ) {    // 投稿・固定ページで記事（著者）情報を出力する
			return $data;
		}

		if ( ! is_author() ) {
			return $data;
		}

		$author = get_queried_object();

		$profile_page_data = array(
			'@context' => 'https://schema.org',
			'@type'    => 'ProfilePage',

			// Thing.
			'name'     => apply_filters( 'the_author', $author->display_name ),
			'url'      => get_author_posts_url( $author->ID ),
		);

		// ProfilePage.image (Thing.image).
		$author_image_object_data = _st_sd_get_user_image_object_data( $author->ID );

		$person_data['image'] = $author_image_object_data;

		// ProfilePage.description (Thing.description).
		$author_description = trim( get_the_author_meta( 'description', $author->ID ) );

		if ( $author_description !== '' ) {
			$person_data['description'] = $author_description;
		}

		// ProfilePage.thumbnailUrl (CreativeWork.thumbnailUrl).
		$profile_page_data['thumbnailUrl'] = $author_image_object_data['url'];

		// ProfilePage.about (CreativeWork.about).
		// ProfilePage.mainEntity (CreativeWork.mainEntity).
		$author_person_data = _st_sd_get_user_person_data( $author->ID );

		if ( $author_person_data !== null ) {
			$profile_page_data['about']      = $author_person_data;
			$profile_page_data['mainEntity'] = $author_person_data;
		}

		// ProfilePage.
		$data['profile_page'] = $profile_page_data;

		return $data;
	}
}

add_filter( 'st_sd_structured_data', 'st_sd_profile_page' );

if ( ! function_exists( '_st_sd_get_comment_graph_data' ) ) {
	/**
	 * 投稿 から schema.org の Comment データを生成する。
	 *
	 * @param WP_Post|int|null $post
	 *
	 * @return array<string, mixed>[]
	 */
	function _st_sd_get_comment_graph_data( $post ) {
		$post = get_post( $post );

		if ( ! comments_open( $post ) || get_comments_number( $post ) === 0 ) {
			return array();
		}

		if ( post_password_required( $post ) ) {
			return array();
		}

		$comment_query = new WP_Comment_Query( [
			'no_found_rows' => true,
			'post_id'       => $post->ID,
			'status'        => 'approve',
			'type'          => 'comment',
		] );

		if ( count( $comment_query->comments ) === 0 ) {
			return array();
		}

		$comment_data_collection = [];

		foreach ( $comment_query->comments as $comment ) {
			$comment_data = [
				'@context'      => 'https://schema.org',
				'@type'         => 'Comment',
				'@id'           => get_comment_link( $comment ),

				// CreativeWork.
				'datePublished' => get_comment_date( DATE_ATOM, $comment->comment_ID ),
				'text'          => trim( strip_tags( get_comment_text( $comment->comment_ID ) ) ),
			];

			$author_user_id = (int) $comment->user_id;

			if ( $author_user_id !== 0 ) {    // 登録ユーザー
				$author_person_data       = _st_sd_get_user_person_data( $author_user_id );
				$author_image_object_data = _st_sd_get_user_image_object_data( $author_user_id );
			} else {    // ゲストユーザー
				$author_name        = ( trim( $comment->comment_author ) !== '' ) ? $comment->comment_author : null;
				$author_email       = ( trim( $comment->comment_author_email ) !== '' ) ? $comment->comment_author_email : null;
				$author_url         = ( trim( $comment->comment_author_url ) !== '' ) ? $comment->comment_author_url : null;
				$author_person_data = _st_sd_get_guest_user_person_data( $author_name, $author_email, $author_url );

				$author_image_object_data = _st_sd_get_guest_user_image_object_data( $author_email );
			}

			// Comment.author (CreativeWork.author).
			if ( $author_person_data !== null ) {
				$comment_data['author'] = $author_person_data;
			}

			// Comment.image (Thing.image).
			// Comment.thumbnailUrl (CreativeWork.thumbnailUrl).
			$comment_data['image']        = $author_image_object_data;
			$comment_data['thumbnailUrl'] = $author_image_object_data['url'];

			// Comment.about (CreativeWork.about).
			if ( (int) $comment->comment_parent !== 0 ) {
				$comment_data['about'] = array( 'id' => get_comment_link( $comment ) );
			}

			$comment_data_collection[] = $comment_data;
		}

		return $comment_data_collection;
	}
}

if ( ! function_exists( 'st_sd_comment_graph' ) ) {
	/**
	 * コメント (Comment) のグラフ
	 *
	 * @param array<string, mixed> $data
	 *
	 * @return array<string, mixed>
	 */
	function st_sd_comment_graph( array $data ) {
		$hide_comment        = ( get_option( 'st-data6' ) === 'yes' );
		$output_article_data = ( get_option( 'st-data407' ) === 'yes' );
		$output_comment_data = ( get_option( 'st-data408' ) === 'yes' );

		if ( $hide_comment || $output_article_data || ! $output_comment_data ) {
			return $data;
		}

		if ( ! is_single() && ! is_page() ) {
			return $data;
		}

		/** @var WP_Post $post */
		$post = get_queried_object();

		$comment_graph_data = _st_sd_get_comment_graph_data( $post );

		if ( count( $comment_graph_data ) === 0 ) {
			return $data;
		}

		$profile_page_data = array(
			'@context' => 'https://schema.org',
			'@graph'   => $comment_graph_data,
		);

		// Comment graph.
		$data['comment_graph'] = $profile_page_data;

		return $data;
	}
}

add_filter( 'st_sd_structured_data', 'st_sd_comment_graph' );
