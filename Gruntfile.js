module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    uglify: {
      options: {
        //banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n',
        mangle: {
    			except: ['jQuery', 'Backbone','masonry']
    		}
      },
      build: {
      	files: {
      		"public/js/script.js": [
      			'bower_components/jquery/dist/jquery.js',
      			"bower_components/bootstrap/dist/js/bootstrap.js",
            'bower_components/masonry/dist/masonry.pkgd.js',
      			"bower_components/ratio-css-repo/js/ratio.js",
            'bower_components/cap/src/form-request.js',
            'bower_components/cap/src/tab-texarea.js',
            'bower_components/cap/src/show-tell.js',
            'bower_components/cap/src/btn-liked.js',
            'bower_components/cap/src/btn-change-value.js',
            'bower_components/cap/src/select-all-text.js',
      		]
      	}
      }
    },
    less: {
    	development: {
        options: {
          compress: true,
          cleancss: true,
        },
    		files: {
    			"public/css/style.css": "less/yeti.less",
    		}
    	}
    },
    copy: {
    	main: {
    		files: [
    			{
    				expand: true,
    				cwd: 'bower_components/bootstrap/fonts/',
    				src: ['*'],
    				dest: "public/fonts/",
    				filter: 'isFile',
    			},
    			{
    				expand: true,
    				cwd: 'bower_components/font-awesome/fonts/',
    				src: ['*'],
    				dest: 'public/fonts/',
    				filter: 'isFile',
    			}
    		]
    	}
    }
  });

  // Load the plugin that provides the "uglify" task.
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks("grunt-contrib-less");
  grunt.loadNpmTasks("grunt-contrib-copy");

  // Default task(s).
  // grunt.registerTask('default', ['less']);

};