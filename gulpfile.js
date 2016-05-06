var gulp = require('gulp'),
	sass = sass = require('gulp-sass');

	gulp.task('default', function() {

	});

	gulp.task('sass', function () {
	    gulp.src('./src/App/TreeBundle/Resources/public/css/master.scss')
	        .pipe(sass({sourceComments: 'map'}))
	        .pipe(gulp.dest('./src/App/TreeBundle/Resources/public/css/'));
	});