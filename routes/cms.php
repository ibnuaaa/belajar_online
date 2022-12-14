<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a bre
eze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// category
$router->get('/category', 'CMS\Category\CategoryController@Home');
$router->get('/category/new', 'CMS\Category\CategoryController@New');
$router->get('/category/edit/{id}', 'CMS\Category\CategoryController@Edit');
$router->get('/category/{id}', 'CMS\Category\CategoryController@Detail');

// course
$router->get('/course', 'CMS\Course\CourseController@Home');
$router->get('/course/new', 'CMS\Course\CourseController@New');
$router->get('/course/gallery', 'CMS\Course\CourseController@Gallery');
$router->get('/course/edit/{id}', 'CMS\Course\CourseController@Edit');
$router->get('/course/lecture/{id}', 'CMS\Course\CourseController@Lecture');
$router->get('/course/lecture/{id}/rank', 'CMS\Course\CourseController@Rank');
$router->get('/course/{id}', 'CMS\Course\CourseController@Detail');
$router->get('/course/user_lecture/{id}', 'CMS\Course\CourseController@UserLecture');
$router->get('/course/user_lecture/{id}/download', 'CMS\Course\CourseController@UserLectureDownload');


$router->get('/home', 'CMS\Home\HomeController@Home');
$router->get('/f/courses/category/{id}', 'CMS\Home\HomeController@Courses');
$router->get('/f/course/{id}', 'CMS\Home\HomeController@Course');
$router->get('/f/lecture/{id}', 'CMS\Home\HomeController@Lecture');
$router->get('/f/question/{id}', 'CMS\Home\HomeController@Question');
$router->get('/f/me', 'CMS\Home\HomeController@Profile');
$router->get('/f/instructor/{id}', 'CMS\Home\HomeController@Profile');

$router->get('/dashboard', 'CMS\Home\HomeController@Dashboard');


$router->get('/logout', 'CMS\Authentication\AuthenticationController@Logout');
$router->get('/signout', 'CMS\Authentication\AuthenticationController@Signout');

$router->get('/position', 'CMS\Position\PositionController@HomeWithPaging');
$router->get('/position/new/{position_id}', 'CMS\Position\PositionController@New');
$router->get('/position/{id}', 'CMS\Position\PositionController@PositionEdit');

$router->get('/jabatan', 'CMS\Jabatan\JabatanController@Home');
$router->get('/jabatan/new/{jabatan_id}', 'CMS\Jabatan\JabatanController@New');
$router->get('/jabatan/{id}', 'CMS\Jabatan\JabatanController@JabatanEdit');

$router->get('/golongan', 'CMS\Golongan\GolonganController@Home');
$router->get('/golongan/new', 'CMS\Golongan\GolonganController@New');
$router->get('/golongan/edit/{id}', 'CMS\Golongan\GolonganController@Edit');
$router->get('/golongan/{id}', 'CMS\Golongan\GolonganController@Detail');

$router->get('/complaint', 'CMS\Complaint\ComplaintController@Home');
$router->get('/complaint/{menu}', 'CMS\Complaint\ComplaintController@Home');
$router->get('/complaint/edit/{id}', 'CMS\Complaint\ComplaintController@Edit');
$router->get('/complaint/detail/{id}/{menu}', 'CMS\Complaint\ComplaintController@Detail');

$router->get('/unit_kerja', 'CMS\UnitKerja\UnitKerjaController@Home');
$router->get('/unit_kerja/new/{unit_kerja_id}', 'CMS\UnitKerja\UnitKerjaController@New');
$router->get('/unit_kerja/{id}', 'CMS\UnitKerja\UnitKerjaController@UnitKerjaEdit');

$router->get('/indikator_kinerja', 'CMS\IndikatorKinerja\IndikatorKinerjaController@Home');
$router->get('/indikator_kinerja/new/{indikator_kinerja_id}', 'CMS\IndikatorKinerja\IndikatorKinerjaController@New');
$router->get('/indikator_kinerja/{id}', 'CMS\IndikatorKinerja\IndikatorKinerjaController@IndikatorKinerjaEdit');

$router->get('/user_request/status/{status}/{menu}', 'CMS\UserRequest\UserRequestController@Home');
$router->get('/user_request/{menu}/{id}', 'CMS\UserRequest\UserRequestController@Detail');

$router->get('/report_skp', 'CMS\ReportSkp\ReportSkpController@Home');

$router->get('/config', 'CMS\Config\ConfigController@Home');
$router->get('/config/new', 'CMS\Config\ConfigController@New');
$router->get('/config/edit/{id}', 'CMS\Config\ConfigController@Edit');
$router->get('/config/{id}', 'CMS\Config\ConfigController@Detail');

$router->get('/pendidikan', 'CMS\Pendidikan\PendidikanController@Home');
$router->get('/pendidikan/new', 'CMS\Pendidikan\PendidikanController@New');
$router->get('/pendidikan/edit/{id}', 'CMS\Pendidikan\PendidikanController@Edit');
$router->get('/pendidikan/{id}', 'CMS\Pendidikan\PendidikanController@Detail');

$router->get('/jadwal_pegawai', 'CMS\JadwalPegawai\JadwalPegawaiController@Home');
$router->get('/jadwal_pegawai/new', 'CMS\JadwalPegawai\JadwalPegawaiController@New');
$router->get('/jadwal_pegawai/edit/{id}', 'CMS\JadwalPegawai\JadwalPegawaiController@Edit');
$router->get('/jadwal_pegawai/{id}', 'CMS\JadwalPegawai\JadwalPegawaiController@Detail');

$router->get('/approval_penilaian_sdm/status/{status}', 'CMS\ApprovalPenilaianSdm\ApprovalPenilaianSdmController@Home');
$router->get('/approval_penilaian_sdm/{id}', 'CMS\ApprovalPenilaianSdm\ApprovalPenilaianSdmController@Detail');

$router->get('/kampus', 'CMS\Kampus\KampusController@Home');
$router->get('/kampus/new', 'CMS\Kampus\KampusController@New');
$router->get('/kampus/edit/{id}', 'CMS\Kampus\KampusController@Edit');
$router->get('/kampus/{id}', 'CMS\Kampus\KampusController@Detail');

$router->get('/pelatihan', 'CMS\Pelatihan\PelatihanController@Home');
$router->get('/pelatihan/new', 'CMS\Pelatihan\PelatihanController@New');
$router->get('/pelatihan/edit/{id}', 'CMS\Pelatihan\PelatihanController@Edit');
$router->get('/pelatihan/{id}', 'CMS\Pelatihan\PelatihanController@Detail');

$router->get('/status_pegawai', 'CMS\StatusPegawai\StatusPegawaiController@Home');
$router->get('/status_pegawai/new', 'CMS\StatusPegawai\StatusPegawaiController@New');
$router->get('/status_pegawai/edit/{id}', 'CMS\StatusPegawai\StatusPegawaiController@Edit');
$router->get('/status_pegawai/{id}', 'CMS\StatusPegawai\StatusPegawaiController@Detail');

$router->get('/document_unit', 'CMS\DocumentUnit\DocumentUnitController@Home');
$router->get('/document_unit/new', 'CMS\DocumentUnit\DocumentUnitController@New');
$router->get('/document_unit/edit/{id}', 'CMS\DocumentUnit\DocumentUnitController@Edit');
$router->get('/document_unit/{id}', 'CMS\DocumentUnit\DocumentUnitController@Detail');

$router->get('/jabatan_fungsional', 'CMS\JabatanFungsional\JabatanFungsionalController@Home');
$router->get('/jabatan_fungsional/new', 'CMS\JabatanFungsional\JabatanFungsionalController@New');
$router->get('/jabatan_fungsional/edit/{id}', 'CMS\JabatanFungsional\JabatanFungsionalController@Edit');
$router->get('/jabatan_fungsional/{id}', 'CMS\JabatanFungsional\JabatanFungsionalController@Detail');

// $router->get('/indikator_skp', 'CMS\IndikatorSkp\IndikatorSkpController@Home');
$router->get('/indikator_skp/new/{tipe_indikator}/{indikator_kinerja_id}/{penilaian_prestasi_kerja_id}', 'CMS\IndikatorSkp\IndikatorSkpController@New');
$router->get('/indikator_skp/edit/{id}/{penilaian_prestasi_kerja_id}', 'CMS\IndikatorSkp\IndikatorSkpController@Edit');
$router->get('/indikator_skp/{id}', 'CMS\IndikatorSkp\IndikatorSkpController@Detail');

$router->get('/user', 'CMS\User\UserController@Home');
$router->get('/user/new', 'CMS\User\UserController@New');
$router->get('/user/edit/{id}', 'CMS\User\UserController@Edit');
$router->get('/user/{id}', 'CMS\User\UserController@Detail');

$router->get('/profile', 'CMS\User\UserController@Profile');
$router->get('/profile/{tab}', 'CMS\User\UserController@ProfileEdit');
$router->get('/profile/{tab}/{id}', 'CMS\User\UserController@ProfileEdit');
$router->get('/change_password', 'CMS\User\UserController@ChangePassword');

$router->get('/notifikasi', 'CMS\Notifikasi\NotifikasiController@Home');

$router->get('/audit_trail', 'CMS\AuditTrail\AuditTrailController@Home');
$router->get('/audit_trail/log_data/{id}', 'CMS\AuditTrail\AuditTrailController@LogData');
