module.exports = function(grunt) {
	
	'use strict';

    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
		
		watch: {
			scripts: {
				files: ['js/*.js','img/*.jpg','img/*.png','img/*.gif'],
				tasks: ['concat', 'uglify','imagemin'],
				options: {
					spawn: false,
				},
			} 
		},
		
		concat: {   
			dist: {
				src: [
					//'js/*.js', // All JS in the js folder
					//'js/creative.js'  // This specific file
				],
				dest: 'js/build/production.js',
			}
		},
		
		uglify: {
			build: {
				src: 'js/build/production.js',
				dest: 'js/build/production.min.js'
			}
		},

        imagemin: {
			dynamic: {
				files: [{
					expand: true,
					cwd: 'img/',
					src: ['**/*.{png,jpg,gif}'],
					dest: 'img/build/'
				}]
			}
		}

    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-contrib-concat','grunt-contrib-uglify','grunt-contrib-imagemin');

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['concat', 'uglify', 'imagemin']);

};