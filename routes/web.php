<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\ClassroomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IcebreakingController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SubmissionsController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\VirtualClassController;

Route::get('/', function () {
    return view('pages.landing.index');
});
Route::get('/test', function () {
    return view('pages.teacher.materials.test');
});

// Route::get('/student', function () {
//     return view('pages.admin.student.index');
// });

// Login Routes
Route::group(['prefix' => 'login', 'as' => 'login.', 'controller' => LoginController::class], function () {
    Route::get('/portal', 'portal')->name('portal');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/operator', 'loginOperator')->name('operator.post');
    Route::post('/teacher', 'loginTeacher')->name('teacher.post');
    Route::post('/student', 'loginStudent')->name('student.post');
    Route::post('/logout', 'logout')->name('logout');
});


// Admin Dashboard Routes
Route::group(
    [
        'prefix' => 'operator/',
        'as' => 'operator.',
        'middleware' => 'role:operator',
        'controller' => DashboardController::class
    ],

    function () {
        Route::get('/', 'index')->name('index');

        // Profile Routes
        Route::group(
            [
                'prefix' => 'profile',
                'as' => 'profile.',
                'controller' => ProfileController::class
            ],

            function () {
                // Route::get('/', 'index')->name('index');
                Route::get('/edit', 'edit')->name('edit');
                // Route::post('/store', 'store')->name('store');
                Route::put('/{id}', 'update')->name('update');
                // Route::delete('/{id}', 'destroy')->name('destroy');
            }
        );

        // Classroom Routes
        Route::group(
            [
                'prefix' => 'classroom/',
                'as' => 'classroom.',
                'controller' => ClassroomController::class
            ],

            function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::delete('/{id}', 'destroy')->name('destroy');
                Route::post('/import', 'import')->name('import');
            }
        );

        // Teacher Routes
        Route::group(
            [
                'prefix' => 'teachers/',
                'as' => 'teachers.',
                'controller' => TeacherController::class
            ],
            function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}', 'update')->name('update');
                Route::delete('/{teacher}', 'destroy')->name('destroy');
                Route::get('/{id}', 'show')->name('show');
                Route::post('/import', 'import')->name('import');
            }
        );


        // Student Routes
        Route::group(
            [
                'prefix' => 'students/',
                'as' => 'students.',
                'controller' => StudentController::class
            ],
            function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}', 'update')->name('update');
                Route::get('/{student}', 'show')->name('show');
                Route::delete('/{id}', 'destroy')->name('destroy');
                Route::post('/import', 'import')->name('import');
            }
        );


        // Subject Routes
        Route::group(
            [
                'prefix' => 'subjects',
                'as' => 'subjects.',
                'controller' => SubjectController::class
            ],
            function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}', 'update')->name('update');
                Route::get('/{id}', 'show')->name('show');
                Route::delete('/{id}', 'destroy')->name('destroy');
                Route::post('/import', 'import')->name('import');
            }
        );
    }
);

// Teacher Dashboard Routes
Route::group([
    'prefix' => 'teacher',
    'as' => 'teacher.',
    'middleware' => ['must.change.password', 'role:teacher'],
    'controller' => DashboardController::class
], function () {
    Route::get('/', 'teacherDashboard')->name('index');

    // Assignment Routes
    Route::group(['prefix' => 'assignments', 'as' => 'assignments.', 'controller' => AssignmentController::class], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{assignment}/submissions', 'showSubmissions')->name('showSubmissions');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // Virtual Class Routes
    Route::group(['prefix' => 'virtual-class', 'as' => 'virtual-class.', 'controller' => VirtualClassController::class], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // Ice Breaking Routes
    Route::group(['prefix' => 'icebreaking', 'as' => 'icebreaking.', 'controller' => IcebreakingController::class], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // Material Routes
    Route::group(['prefix' => 'materials', 'as' => 'materials.', 'controller' => MaterialController::class], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // Submission Routes
    Route::group(['prefix' => 'submissions', 'as' => 'submissions.', 'controller' => SubmissionsController::class], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::put('/submissions/{submission}', 'updateScore')->name('updateScore');
        // Route::get('/show/{assignment}', 'show')->name('show');
        // Route::post('/store', 'store')->name('store');
        // Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // Profile Teacher Routes
    Route::group(
        [
            'prefix' => 'profile',
            'as' => 'profile.',
            'controller' => ProfileController::class
        ],

        function () {
            Route::get('/edit', 'edit_teacher')->name('edit');
            Route::put('/{id}', 'update_teacher')->name('update');
        }
    );
});

// Student Dashboard Routes
Route::group([
    'prefix' => 'student',
    'as' => 'student.',
    'middleware' => ['must.change.password', 'role:student'],
    'controller' => DashboardController::class
], function () {
    Route::get('/', 'studentDashboard')->name('index');

    Route::group(['prefix' => 'materials', 'as' => 'materials.', 'controller' => MaterialController::class], function () {
        Route::get('/', 'studentMaterialsIndex')->name('studentMaterialsIndex');
        Route::get('/{id}', 'studentMaterialsShow')->name('studentMaterialsShow');
    });

    Route::group(['prefix' => 'assignments', 'as' => 'assignments.', 'controller' => AssignmentController::class], function () {
        Route::get('/', 'studentAssignmentsIndex')->name('studentAssignmentsIndex');
        Route::get('/{assignment}', 'studentAssignmentsShow')->name('Show');
        Route::post('/{assignment}/submit', 'studentAssignmentsSubmit')->name('submit');
    });

    Route::group([
        'prefix' => 'evaluations', 'as' => 'evaluations.', 'controller' => SubmissionsController::class], function () {
        Route::get('/', 'evaluations')->name('index');
        Route::get('/{id}', 'evaluationDetail')->name('show');
    });


    // Virtual Class Routes
    Route::group(['prefix' => 'virtual-class', 'as' => 'virtual-class.', 'controller' => VirtualClassController::class], function () {
        Route::get('/', 'studentVirtualClassIndex')->name('studentVirtualClassIndex');
    });

    // Ice Breaking Routes
    Route::group(['prefix' => 'icebreaking', 'as' => 'icebreaking.', 'controller' => IcebreakingController::class], function () {
        Route::get('/', 'studentIcebreakingIndex')->name('index');
        // Route::get('/create', 'create')->name('create');
        // Route::post('/store', 'store')->name('store');
        // Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // Profile Routes
    Route::group(
        [
            'prefix' => 'profile',
            'as' => 'profile.',
            'controller' => ProfileController::class
        ],

        function () {
            Route::get('/edit', 'edit_student')->name('edit');
            Route::put('/{id}', 'update_student')->name('update');
        }
    );
});

// Password Change Routes
Route::group([
    'prefix' => 'password',
    'as' => 'password.',
    'controller' => PasswordController::class
], function () {
    Route::post('/change', 'changePassword')->name('change');
});
