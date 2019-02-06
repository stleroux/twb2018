<?php

function checkACL($acl) {
	if(Auth::check()) {
		if ($acl == 'guest') {
			if (Auth::user()->role_id <= 80) {
				return true;
			}
		} elseif ($acl == 'user') {
			if (Auth::user()->role_id <= 70) {
				return true;
			}
		} elseif ($acl == 'author') {
			if (Auth::user()->role_id <= 60) {
				return true;
			}
		} elseif ($acl == 'timeTrack') {
			if (Auth::user()->role_id <= 55) {
				return true;
			}
		} elseif ($acl == 'editor') {
			if (Auth::user()->role_id <= 50) {
				return true;
			}
		} elseif ($acl == 'publisher') {
			if (Auth::user()->role_id <= 40) {
				return true;
			}
		} elseif ($acl == 'manager') {
			if (Auth::user()->role_id <= 30) {
				return true;
			}
		} elseif ($acl == 'admin') {
			if (Auth::user()->role_id <= 20) {
				return true;
			}
		} elseif ($acl == 'superadmin') {
			if (Auth::user()->role_id <= 10) {
				return true;
			}
		}
	} 
}


function checkOwner($model) {
	if(Auth::check()) {
		if($model->user_id == Auth::user()->id) {
			//return 'checkOwner';
			return true;
		}
	}
}


function actionButtons($action, $modelName = null) {
	if(Auth::check()) {
		
		if($action == 'create') {
			if(Auth::user()->actionButtons == 1) {
				// Icons and Text
				return '<i class="fa fa-plus-square" aria-hidden="true"></i> New ' . ucfirst($modelName);
			}
			if(Auth::user()->actionButtons == 2) {
				// Icons Only
				return '<i class="fa fa-plus-square" aria-hidden="true"></i>';
			}
			if(Auth::user()->actionButtons == 3) {
				// Text Only
				return 'New ' . ucfirst($modelName);
			}
		}

		if($action == 'edit') {
			if(Auth::user()->actionButtons == 1) {
				// Icons and Text
				return '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit';
			}
			if(Auth::user()->actionButtons == 2) {
				// Icons Only
				return '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>';
			}
			if(Auth::user()->actionButtons == 3) {
				// Text Only
				return 'Edit';
			}
		}

		if($action == 'delete') {
			if(Auth::user()->actionButtons == 1) {
				// Icons and Text
				return '<i class="fa fa-trash" aria-hidden="true"></i> Delete';
			}
			if(Auth::user()->actionButtons == 2) {
				// Icons Only
				return '<i class="fa fa-trash" aria-hidden="true"></i>';
			}
			if(Auth::user()->actionButtons == 3) {
				// Text Only
				return 'Delete';
			}
		}

	}

}



// function actionLog($action, $model, $newModel = NULL) {
	
// 		if ($action == 'index') {
// 			if(Auth::check()) {
// 				// Log::info(Auth::user()->username . " (" . Auth::user()->id . ") accessed the index page");
// 				Log::info(Auth::user()->username . " (" . Auth::user()->id . ") accessed :: ");
// 			} else {
// 				Log::info('A guest accessed the index page');
// 			}
// 		}
// 		if ($action == 'create') {
// 			// Log::info(Auth::user()->username . " (" . Auth::user()->id . ") accessed the create page");
// 			Log::info(Auth::user()->username . " (" . Auth::user()->id . ") accessed the create page");
// 		}
// 		if ($action == 'store') {
// 			//Log::info(Auth::user()->username . " (" . Auth::user()->id . ") accessed the " . $model . " create page");
// 			Log::info(Auth::user()->username . " (" . Auth::user()->id . ") saved (" . $model->id . ")\r\n", [json_decode($model, true)]);
// 		}
// 		if ($action == 'show') {
// 			// Log::info(Auth::user()->username . " (" . Auth::user()->id . ") viewed (" . $article->id . ")");
// 			Log::info(Auth::user()->username . " (" . Auth::user()->id . ") viewed (" . $model->id . ")");
// 		}
// 		if ($action == 'edit') {
// 			// Log::info(Auth::user()->username . " (" . Auth::user()->id . ") edited (" . $article->id . ")\r\n", [json_decode($article, true)]);
// 			Log::info(Auth::user()->username . " (" . Auth::user()->id . ") edited (" . $model->id . ")\r\n", [json_decode($model, true)]);
// 		}
// 		if ($action == 'update') {
// 			// Log::info(Auth::user()->username . " (" . Auth::user()->id . ") updated (" . $article->id . ")\r\n", [json_decode($article, true)]);
// 			Log::info(Auth::user()->username . " (" . Auth::user()->id . ") updated (" . $model->id . ")\r\n", [json_decode($model, true)]);
// 		}
// 		if ($action == 'delete') {
// 			// Log::info(Auth::user()->username . " (" . Auth::user()->id . ") deleted (" . $article->id . ")\r\n", [json_decode($article, true)]);
// 			Log::info(Auth::user()->username . " (" . Auth::user()->id . ") deleted (" . $model->id . ")\r\n", [json_decode($model, true)]);
// 		}
// 		if ($action == 'duplicate') {
// 			// Log::info(Auth::user()->username . " (" . Auth::user()->id . ") duplicated (" . $article->id . ")\r\n", [json_decode($newArticle, true)]);
// 			Log::info(Auth::user()->username . " (" . Auth::user()->id . ") duplicated (" . $model->id . ")\r\n", [json_decode($newModel, true)]);
// 		}
		
// 	} else {
// 		if ($action == 'index') {
// 			Log::info('A guest accessed the index page');
// 		}
// 		if ($action == 'show') {
// 			Log::info('A guest viewed (' . $model->id) . ')';
// 		}
// 	}
// }

function getClientIP(){
	return $_SERVER["REMOTE_ADDR"];
}

