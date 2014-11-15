module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    compass: {              // Task
      dit: {                // Target
        options: {          // Target options
          sassDir: 'public/sass',
          cssDir: 'public/css',
          environment: 'production',
          outputStyle: 'nested',
          watch:true
        }
      },
      dev: {              // Another target
        options: {
          sassDir: 'public/sass',
          cssDir: 'public/css'
        }
      }
    },

    jshint: {
      all: ['Gruntfile.js', 'public/js/*.js']
    },

    imagemin: {                          // Task
      dynamic: {                         // Another target
        options: {
          optimizationLevel: 0,
          pngquant: true
        },
        files: [{
          expand: true,                 // Enable dynamic expansion
          cwd: 'public/images/',       // Src matches are relative to this path
          src: ['*.{png,jpg,gif}'],   // Actual patterns to match
          dest: 'public/images/opt/'                  // Destination path prefix
        }]
      }
    },

    // Media Queries
    cmq: {
        options: {
          log: false
        },
        your_target: {
          files: {
            'public/css': ['public/css/main.css']
          }
        }
      }
  });

  // Load compass plugin
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-combine-media-queries');

  // Default task(s).
  grunt.registerTask('default', 
    ['compass:dit']);
};