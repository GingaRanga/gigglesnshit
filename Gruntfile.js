module.exports = function(grunt) {
	
	'use strict';

    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
		
		imagemin: { 
		
			static: {                          // Target
				options: {                       // Target options
					optimizationLevel: 7,
				},
				files: {                         // Dictionary of files
					'img/build/portfolio/watermelon.jpg': 'img/portfolio/watermelon.jpg', // 'destination': 'source'
				}
			},
			
			//dynamic: {                         // Another target
				//files: [{
					//expand: true,                  // Enable dynamic expansion
					//cwd: 'img/',                   // Src matches are relative to this path
					//src: ['**/*.{png,jpg,gif}'],   // Actual patterns to match
					//dest: 'img/build/'                  // Destination path prefix
				//}]
			//}
			
		}
		
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
		
		/*
		cssmin: {
			build: {
				src: ['css/creative.css'],
				dest: 'css/creative.min.css',
			}
		},
		*/
		
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
	//grunt.loadNpmTasks('grunt-contrib-cssmin');
	//grunt.loadNpmTasks('grunt-contrib-htmlmin');
	//grunt.loadNpmTasks('grunt-responsive-images');
	grunt.loadNpmTasks('grunt-contrib-imagemin');




    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    //grunt.registerTask('default', ['uglify']);
	//grunt.registerTask('default', ['cssmin']);
	//grunt.registerTask('default', ['htmlmin']);
	//grunt.registerTask('default', ['responsive_images']);
	grunt.registerTask('default', ['imagemin']);

};