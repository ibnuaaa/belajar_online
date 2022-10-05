<?php

$prefix = '/api';

/* Users */
// getters
$router->get($prefix.'/user', ['uses' => 'User\UserBrowseController@get', 'middleware' => ['LogActivity:User.View','ArrQuery']]);
$router->get($prefix.'/user/{query:.+}', ['uses' => 'User\UserBrowseController@get', 'middleware' => ['LogActivity:User.View','ArrQuery']]);
// actions
$router->post($prefix.'/user', ['uses' => 'User\UserController@Insert', 'middleware' => ['LogActivity:User.Insert','User.Insert']]);
$router->put($prefix.'/user/change_password', ['uses' => 'User\UserController@ChangePassword', 'middleware' => ['LogActivity:User.ChangePassword','User.ChangePassword']]);
$router->put($prefix.'/user/{id}', ['uses' => 'User\UserController@Update', 'middleware' => ['LogActivity:User.Update','User.Update']]);
$router->post($prefix.'/user/reset_password', ['uses' => 'User\UserController@ResetPassword', 'middleware' => ['LogActivity:User.ResetPassword','User.ResetPassword']]);
$router->post($prefix.'/user/change_status', ['uses' => 'User\UserController@ChangeStatus', 'middleware' => ['LogActivity:User.ChangeStatus','User.ChangeStatus']]);

$router->put($prefix.'/user_request/check_exist', ['uses' => 'UserRequest\UserRequestController@CheckExist', 'middleware' => ['LogActivity:UserRequest.Update','UserRequest.CheckExist']]);
$router->post($prefix.'/user_request/request_approval', ['uses' => 'UserRequest\UserRequestController@RequestApproval', 'middleware' => ['LogActivity:UserRequest.RequestApproval','UserRequest.RequestApproval']]);
$router->post($prefix.'/user_request/approve', ['uses' => 'UserRequest\UserRequestController@Approve', 'middleware' => ['LogActivity:UserRequest.Approve','UserRequest.Approve']]);
$router->post($prefix.'/user_request/reject', ['uses' => 'UserRequest\UserRequestController@Reject', 'middleware' => ['LogActivity:UserRequest.Reject','UserRequest.Reject']]);
$router->get($prefix.'/user_request', ['uses' => 'UserRequest\UserRequestBrowseController@get', 'middleware' => ['LogActivity:UserRequest.View','ArrQuery']]);
$router->get($prefix.'/user_request/{query:.+}', ['uses' => 'UserRequest\UserRequestBrowseController@get', 'middleware' => ['LogActivity:UserRequest.View','ArrQuery']]);
$router->put($prefix.'/user_request/{id}', ['uses' => 'UserRequest\UserRequestController@Update', 'middleware' => ['LogActivity:UserRequest.Update','UserRequest.Update']]);

$router->delete($prefix.'/user/{id}', ['uses' => 'User\UserController@Delete', 'middleware' => ['LogActivity:User.Delete','User.Delete']]);
// Developer
$router->post($prefix.'/user/{id}/developer/token', ['uses' => 'User\UserController@DeveloperToken', 'middleware' => ['User.Developer.Token']]);

// getters
$router->get($prefix.'/position', ['uses' => 'Position\PositionBrowseController@get', 'middleware' => ['LogActivity:Position.View','ArrQuery']]);
$router->get($prefix.'/position/{query:.+}', ['uses' => 'Position\PositionBrowseController@get', 'middleware' => ['LogActivity:Position.View','ArrQuery']]);

// actions
$router->post($prefix.'/position', ['uses' => 'Position\PositionController@Insert', 'middleware' => ['LogActivity:Position.Insert','Position.Insert']]);
$router->put($prefix.'/position/{id}', ['uses' => 'Position\PositionController@Update', 'middleware' => ['LogActivity:Position.Update','Position.Update']]);
$router->delete($prefix.'/position/{id}', ['uses' => 'Position\PositionController@Delete', 'middleware' => ['LogActivity:Position.Delete','Position.Delete']]);
$router->post($prefix.'/position/change_status', ['uses' => 'Position\PositionController@ChangeStatus', 'middleware' => ['LogActivity:Position.ChangeStatus','Position.ChangeStatus']]);

// jabatan
$router->get($prefix.'/jabatan', ['uses' => 'Jabatan\JabatanBrowseController@get', 'middleware' => ['LogActivity:Jabatan.View','ArrQuery']]);
$router->get($prefix.'/jabatan/{query:.+}', ['uses' => 'Jabatan\JabatanBrowseController@get', 'middleware' => ['LogActivity:Jabatan.View','ArrQuery']]);
$router->post($prefix.'/jabatan', ['uses' => 'Jabatan\JabatanController@Insert', 'middleware' => ['LogActivity:Jabatan.Insert','Jabatan.Insert']]);
$router->put($prefix.'/jabatan/{id}', ['uses' => 'Jabatan\JabatanController@Update', 'middleware' => ['LogActivity:Jabatan.Update','Jabatan.Update']]);
$router->delete($prefix.'/jabatan/{id}', ['uses' => 'Jabatan\JabatanController@Delete', 'middleware' => ['LogActivity:Jabatan.Delete','Jabatan.Delete']]);

$router->delete($prefix.'/document/{id}', ['uses' => 'Document\DocumentController@Delete', 'middleware' => ['LogActivity:Document.Delete','Document.Delete']]);


// unit kerja
$router->get($prefix.'/unit_kerja', ['uses' => 'UnitKerja\UnitKerjaBrowseController@get', 'middleware' => ['LogActivity:UnitKerja.View','ArrQuery']]);
$router->get($prefix.'/unit_kerja/{query:.+}', ['uses' => 'UnitKerja\UnitKerjaBrowseController@get', 'middleware' => ['LogActivity:UnitKerja.View','ArrQuery']]);
$router->post($prefix.'/unit_kerja', ['uses' => 'UnitKerja\UnitKerjaController@Insert', 'middleware' => ['LogActivity:UnitKerja.Insert','UnitKerja.Insert']]);
$router->put($prefix.'/unit_kerja/{id}', ['uses' => 'UnitKerja\UnitKerjaController@Update', 'middleware' => ['LogActivity:UnitKerja.Update','UnitKerja.Update']]);
$router->delete($prefix.'/unit_kerja/{id}', ['uses' => 'UnitKerja\UnitKerjaController@Delete', 'middleware' => ['LogActivity:UnitKerja.Delete','UnitKerja.Delete']]);


$router->post($prefix.'/upload', ['uses' => 'File\FileController@Upload', 'middleware' => ['LogActivity:File.Upload','File.Upload']]);

$router->post($prefix.'/storage/save', ['uses' => 'Storage\StorageController@Save', 'middleware' => ['LogActivity:Storage.Save','Storage.Save']]);
$router->post($prefix.'/storage/save_exel', ['uses' => 'Storage\StorageController@SaveExel', 'middleware' => ['LogActivity:Storage.SaveExel','Storage.SaveExel']]);
$router->delete($prefix.'/storage/delete_by_key/{uuid}', ['uses' => 'Storage\StorageController@DeleteByKey', 'middleware' => ['LogActivity:Storage.DeleteByKey','Storage.DeleteByKey']]);

// mail
$router->get($prefix.'/log_activity', ['uses' => 'LogActivity\LogActivityBrowseController@get', 'middleware' => ['LogActivity:LogActivity.View', 'ArrQuery']]);
$router->get($prefix.'/log_activity/{query:.+}', ['uses' => 'LogActivity\LogActivityBrowseController@get', 'middleware' => ['LogActivity:LogActivity.View','ArrQuery']]);


// config
$router->get($prefix.'/config', ['uses' => 'Config\ConfigBrowseController@get', 'middleware' => ['LogActivity:Config.View','ArrQuery']]);
$router->get($prefix.'/config/{query:.+}', ['uses' => 'Config\ConfigBrowseController@get', 'middleware' => ['Config:Config.View','ArrQuery']]);
$router->post($prefix.'/config', ['uses' => 'Config\ConfigController@Insert', 'middleware' => ['LogActivity:Config.Insert','Config.Insert']]);
$router->put($prefix.'/config/{id}', ['uses' => 'Config\ConfigController@Update', 'middleware' => ['LogActivity:Config.Update','Config.Update']]);
$router->delete($prefix.'/config/{id}', ['uses' => 'Config\ConfigController@Delete', 'middleware' => ['LogActivity:Config.Delete','Config.Delete']]);

$router->post($prefix.'/user', ['uses' => 'User\UserController@Insert', 'middleware' => ['LogActivity:User.Insert','User.Insert']]);
$router->put($prefix.'/user/change_password', ['uses' => 'User\UserController@ChangePassword', 'middleware' => ['LogActivity:User.ChangePassword','User.ChangePassword']]);
$router->put($prefix.'/user/{id}', ['uses' => 'User\UserController@Update', 'middleware' => ['LogActivity:User.Update','User.Update']]);

// category
$router->get($prefix.'/category', ['uses' => 'Category\CategoryBrowseController@get', 'middleware' => ['LogActivity:Category.View','ArrQuery']]);
$router->get($prefix.'/category/{query:.+}', ['uses' => 'Category\CategoryBrowseController@get', 'middleware' => ['Category:Category.View','ArrQuery']]);
$router->post($prefix.'/category', ['uses' => 'Category\CategoryController@Insert', 'middleware' => ['LogActivity:Category.Insert','Category.Insert']]);
$router->put($prefix.'/category/{id}', ['uses' => 'Category\CategoryController@Update', 'middleware' => ['LogActivity:Category.Update','Category.Update']]);
$router->delete($prefix.'/category/{id}', ['uses' => 'Category\CategoryController@Delete', 'middleware' => ['LogActivity:Category.Delete','Category.Delete']]);

// course
$router->get($prefix.'/course', ['uses' => 'Course\CourseBrowseController@get', 'middleware' => ['LogActivity:Course.View','ArrQuery']]);
$router->get($prefix.'/course/{query:.+}', ['uses' => 'Course\CourseBrowseController@get', 'middleware' => ['Course:Course.View','ArrQuery']]);
$router->post($prefix.'/course', ['uses' => 'Course\CourseController@Insert', 'middleware' => ['LogActivity:Course.Insert','Course.Insert']]);
$router->put($prefix.'/course/{id}', ['uses' => 'Course\CourseController@Update', 'middleware' => ['LogActivity:Course.Update','Course.Update']]);
$router->delete($prefix.'/course/{id}', ['uses' => 'Course\CourseController@Delete', 'middleware' => ['LogActivity:Course.Delete','Course.Delete']]);

// section
$router->get($prefix.'/section', ['uses' => 'Section\SectionBrowseController@get', 'middleware' => ['LogActivity:Section.View','ArrQuery']]);
$router->get($prefix.'/section/{query:.+}', ['uses' => 'Section\SectionBrowseController@get', 'middleware' => ['Section:Section.View','ArrQuery']]);
$router->post($prefix.'/section', ['uses' => 'Section\SectionController@Insert', 'middleware' => ['LogActivity:Section.Insert','Section.Insert']]);
$router->put($prefix.'/section/{id}', ['uses' => 'Section\SectionController@Update', 'middleware' => ['LogActivity:Section.Update','Section.Update']]);
$router->delete($prefix.'/section/{id}', ['uses' => 'Section\SectionController@Delete', 'middleware' => ['LogActivity:Section.Delete','Section.Delete']]);

// lecture
$router->get($prefix.'/lecture', ['uses' => 'Lecture\LectureBrowseController@get', 'middleware' => ['LogActivity:Lecture.View','ArrQuery']]);
$router->get($prefix.'/lecture/{query:.+}', ['uses' => 'Lecture\LectureBrowseController@get', 'middleware' => ['Lecture:Lecture.View','ArrQuery']]);
$router->post($prefix.'/lecture', ['uses' => 'Lecture\LectureController@Insert', 'middleware' => ['LogActivity:Lecture.Insert','Lecture.Insert']]);
$router->put($prefix.'/lecture/{id}', ['uses' => 'Lecture\LectureController@Update', 'middleware' => ['LogActivity:Lecture.Update','Lecture.Update']]);
$router->delete($prefix.'/lecture/{id}', ['uses' => 'Lecture\LectureController@Delete', 'middleware' => ['LogActivity:Lecture.Delete','Lecture.Delete']]);

// exercise
$router->get($prefix.'/exercise', ['uses' => 'Exercise\ExerciseBrowseController@get', 'middleware' => ['LogActivity:Exercise.View','ArrQuery']]);
$router->get($prefix.'/exercise/{query:.+}', ['uses' => 'Exercise\ExerciseBrowseController@get', 'middleware' => ['ArrQuery']]);
$router->post($prefix.'/exercise', ['uses' => 'Exercise\ExerciseController@Insert', 'middleware' => ['LogActivity:Exercise.Insert','Exercise.Insert']]);
$router->post($prefix.'/exercise/answer', ['uses' => 'Exercise\ExerciseController@Answer', 'middleware' => ['LogActivity:Exercise.Insert','Exercise.Answer']]);
$router->put($prefix.'/exercise/{id}', ['uses' => 'Exercise\ExerciseController@Update', 'middleware' => ['LogActivity:Exercise.Update','Exercise.Update']]);
$router->delete($prefix.'/exercise/{id}', ['uses' => 'Exercise\ExerciseController@Delete', 'middleware' => ['LogActivity:Exercise.Delete','Exercise.Delete']]);

// exercise_type
$router->get($prefix.'/exercise_type', ['uses' => 'ExerciseType\ExerciseTypeBrowseController@get', 'middleware' => ['LogActivity:ExerciseType.View','ArrQuery']]);
$router->get($prefix.'/exercise_type/{query:.+}', ['uses' => 'ExerciseType\ExerciseTypeBrowseController@get', 'middleware' => ['ExerciseType:ExerciseType.View','ArrQuery']]);
$router->post($prefix.'/exercise_type', ['uses' => 'ExerciseType\ExerciseTypeController@Insert', 'middleware' => ['LogActivity:ExerciseType.Insert','ExerciseType.Insert']]);
$router->put($prefix.'/exercise_type/{id}', ['uses' => 'ExerciseType\ExerciseTypeController@Update', 'middleware' => ['LogActivity:ExerciseType.Update','ExerciseType.Update']]);
$router->delete($prefix.'/exercise_type/{id}', ['uses' => 'ExerciseType\ExerciseTypeController@Delete', 'middleware' => ['LogActivity:ExerciseType.Delete','ExerciseType.Delete']]);

// exercise_option
$router->get($prefix.'/exercise_option', ['uses' => 'ExerciseOption\ExerciseOptionBrowseController@get', 'middleware' => ['LogActivity:ExerciseOption.View','ArrQuery']]);
$router->get($prefix.'/exercise_option/{query:.+}', ['uses' => 'ExerciseOption\ExerciseOptionBrowseController@get', 'middleware' => ['ExerciseOption:ExerciseOption.View','ArrQuery']]);
$router->post($prefix.'/exercise_option', ['uses' => 'ExerciseOption\ExerciseOptionController@Insert', 'middleware' => ['LogActivity:ExerciseOption.Insert','ExerciseOption.Insert']]);
$router->put($prefix.'/exercise_option/{id}', ['uses' => 'ExerciseOption\ExerciseOptionController@Update', 'middleware' => ['LogActivity:ExerciseOption.Update','ExerciseOption.Update']]);
$router->delete($prefix.'/exercise_option/{id}', ['uses' => 'ExerciseOption\ExerciseOptionController@Delete', 'middleware' => ['LogActivity:ExerciseOption.Delete','ExerciseOption.Delete']]);

// user_exercise
$router->get($prefix.'/user_exercise', ['uses' => 'UserExercise\UserExerciseBrowseController@get', 'middleware' => ['LogActivity:UserExercise.View','ArrQuery']]);
$router->get($prefix.'/user_exercise/{query:.+}', ['uses' => 'UserExercise\UserExerciseBrowseController@get', 'middleware' => ['UserExercise:UserExercise.View','ArrQuery']]);
$router->post($prefix.'/user_exercise', ['uses' => 'UserExercise\UserExerciseController@Insert', 'middleware' => ['LogActivity:UserExercise.Insert','UserExercise.Insert']]);
$router->put($prefix.'/user_exercise/{id}', ['uses' => 'UserExercise\UserExerciseController@Update', 'middleware' => ['LogActivity:UserExercise.Update','UserExercise.Update']]);
$router->delete($prefix.'/user_exercise/{id}', ['uses' => 'UserExercise\UserExerciseController@Delete', 'middleware' => ['LogActivity:UserExercise.Delete','UserExercise.Delete']]);

// user_exercise_answer
$router->get($prefix.'/user_exercise_answer', ['uses' => 'UserExerciseAnswer\UserExerciseAnswerBrowseController@get', 'middleware' => ['LogActivity:UserExerciseAnswer.View','ArrQuery']]);
$router->get($prefix.'/user_exercise_answer/{query:.+}', ['uses' => 'UserExerciseAnswer\UserExerciseAnswerBrowseController@get', 'middleware' => ['UserExerciseAnswer:UserExerciseAnswer.View','ArrQuery']]);
$router->post($prefix.'/user_exercise_answer', ['uses' => 'UserExerciseAnswer\UserExerciseAnswerController@Insert', 'middleware' => ['LogActivity:UserExerciseAnswer.Insert','UserExerciseAnswer.Insert']]);
$router->put($prefix.'/user_exercise_answer/{id}', ['uses' => 'UserExerciseAnswer\UserExerciseAnswerController@Update', 'middleware' => ['LogActivity:UserExerciseAnswer.Update','UserExerciseAnswer.Update']]);
$router->delete($prefix.'/user_exercise_answer/{id}', ['uses' => 'UserExerciseAnswer\UserExerciseAnswerController@Delete', 'middleware' => ['LogActivity:UserExerciseAnswer.Delete','UserExerciseAnswer.Delete']]);

// user_lecture
$router->get($prefix.'/user_lecture', ['uses' => 'UserLecture\UserLectureBrowseController@get', 'middleware' => ['ArrQuery']]);
$router->get($prefix.'/user_lecture/{query:.+}', ['uses' => 'UserLecture\UserLectureBrowseController@get', 'middleware' => ['ArrQuery']]);
$router->post($prefix.'/user_lecture', ['uses' => 'UserLecture\UserLectureController@Insert', 'middleware' => ['LogActivity:UserLecture.Insert','UserLecture.Insert']]);
$router->put($prefix.'/user_lecture/{id}', ['uses' => 'UserLecture\UserLectureController@Update', 'middleware' => ['LogActivity:UserLecture.Update','UserLecture.Update']]);
$router->put($prefix.'/user_lecture/{id}/start', ['uses' => 'UserLecture\UserLectureController@Start', 'middleware' => ['LogActivity:UserLecture.Start','UserLecture.Start']]);
$router->delete($prefix.'/user_lecture/{id}', ['uses' => 'UserLecture\UserLectureController@Delete', 'middleware' => ['LogActivity:UserLecture.Delete','UserLecture.Delete']]);
