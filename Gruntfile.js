module.exports = function(grunt) {
	
	'use strict';

    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
		
		/*
		responsive_images: {
			myTask: {
				options: {
				// Task-specific options go here.
				engine: 'im',
				newFilesOnly: 'true'
				},
				files: {
				// Target-specific file lists and/or options go here.
				'img/portfolio/opt/watermelon.jpg': 'img/portfolio/watermelon.jpg'
				},
			},
		},
		*/
		
		/*
		htmlmin: {
			build: {
				
				options: {
					removeComments: true,
					collapseWhitespace: true
				},
				
				src: ['index.php'],
				dest: 'index.min.php',
			}
		},
		*/
		
		cssmin: {
			build: {
				src: ['css/creative.css'],
				dest: 'css/creative.min.css',
			}
		},
		
		//just replace src file with the .js file you want to minify and select destination file and path
		/*uglify: {
			build: {
				src: 'js/jquery.easing.min.js',
				dest: 'js/build/jquery.easing.min.min.js'
			}
		},
		*/

    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    //grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	//grunt.loadNpmTasks('grunt-contrib-htmlmin');
	//grunt.loadNpmTasks('grunt-responsive-images');




    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    //grunt.registerTask('default', ['uglify']);
	grunt.registerTask('default', ['cssmin']);
	//grunt.registerTask('default', ['htmlmin']);
	//grunt.registerTask('default', ['responsive_images']);

};