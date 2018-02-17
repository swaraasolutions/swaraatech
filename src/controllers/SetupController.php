<?php

namespace SwaraaTech\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use SwaraaTech\Models\SpacesManager;

class SetupController extends Controller {
	//

	/**
	 * SetupController constructor.
	 */
	public function __construct() {
//		$this->middleware( "auth" );
		if ( getenv( "SM_ENABLED" ) ) {
			app()->config["filesystems.disks.spaces"]    = [
				'driver'   => 's3',
				'key'      => env( 'SM_SPACES_KEY' ),
				'secret'   => env( 'SM_SPACES_SECRET' ),
				'endpoint' => env( 'SM_SPACES_ENDPOINT' ),
				'region'   => env( 'SM_SPACES_REGION' ),
				'bucket'   => env( 'SM_SPACES_BUCKET' ),
			];
			app()->config["filesystems.disks.checkpath"] = [
				'driver' => 'local',
				'root'   => env( 'SM_CHECK_PATH' )
			];
		}
	}

	public function index() {
		if ( getenv( "SM_ENABLED" ) ) {
			$files = Storage::disk( "checkpath" )->allFiles( "." );
			foreach ( $files as $file ) {
				$days     = Carbon::createFromTimestampUTC( Storage::disk( "checkpath" )->lastModified( $file ) );
				$now      = Carbon::now();
				$filePath = getenv( "SM_CHECK_PATH" ) . $file;
				$fileName = basename( $file );
				$size     = number_format( Storage::disk( "checkpath" )->size( $file ) / 1048576, 2 );
//				dd((float)getenv("SM_CHECK_SIZE"));
				if ( (int) $days->diffInDays( $now ) > (int) getenv( "SM_CHECK_DAYS" ) && (float) $size >= (float) getenv( "SM_CHECK_SIZE" ) ) {
					$status = Storage::disk( "spaces" )->putFileAs( "", new File( $filePath ), $file, 'public' );
					if ( $status ) {
						Storage::disk( "checkpath" )->delete( $file );
					}
					if ( env( "SM_MANAGE_404" ) && Schema::hasTable( "spaces_manager" ) ) {
						$manager             = new SpacesManager();
						$manager->moved_file = $file;
						$manager->save();
					}
					echo $status;
				} else {
					echo $fileName . $size;
				}
			}
		}

		dd( Config::get( "filesystems" ) );
	}

	public static function call( $instance ) {
	}

	public function imageLoader( $slug ) {
		if ( env( "SM_ENABLED" ) ) {
			$status = Storage::disk( "checkpath" )->exists( $slug );
			if ( ! $status ) {
				$file = SpacesManager::where( "moved_file", $slug )->first();
				if ( $file ) {
					$test = Storage::disk( "spaces" )->get( $slug );
					$mime = Storage::disk( "spaces" )->mimeType( $slug );

					return response( $test, 200 )->header( 'Content-Type', $mime );
				} else {
					return response( "", 404 );
				}
			}
		}


	}

//	function formatSizeUnits( $bytes ) {
//			$bytes = number_format( $bytes / 1048576, 2 ) . ' MB';
//		} elseif ( $bytes >= 1024 ) {
//			$bytes = number_format( $bytes / 1024, 2 ) . ' KB';
//		} elseif ( $bytes > 1 ) {
//			$bytes = $bytes . ' bytes';
//		} elseif ( $bytes == 1 ) {
//			$bytes = $bytes . ' byte';
//		} else {
//			$bytes = '0 bytes';
//		}
//
//		return $bytes;
//	}
}
