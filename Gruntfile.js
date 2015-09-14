module.exports = function(grunt) {

  require('time-grunt')(grunt);

  require('load-grunt-tasks')(grunt);

  grunt.initConfig({
    project: {name: 'music_blog_theme'},
    paths: {
      js: '<%= project.name %>/library/js/',
      less: '<%= project.name %>/library/less/',
      base: '<%= project.name %>/'
    },
    less: {
      dev: {
        files: {
          "<%= paths.base %>/library/css/style.css": "<%= paths.less %>app.less"
        }
      },
      prod: {
        options: {
          compress: true
        },
        files: {
          "<%= paths.base %>/library/css/style.css": "<%= paths.less %>app.less"
        }
      }
    },
    // copy: {
    //   main: {
    //     nonull: true,
    //     src: 'glasspoint_v1.0/*',
    //     dest: '../../original/glasspoint-website/',
    //   },
    // },
    uglify: {
      dev: {
        options: {
          mangle: false,
          compress: false,
          beautify: true
        },
        files: {
          '<%= paths.base %>scripts.js': [
           '<%= paths.js %>modernizr-2.6.2.min.js',
           '<%= paths.js %>jquery.min.js',
           '<%= paths.js %>main.js'
          ]
        }
      },
      prod: {
        options: {
          mangle: false,
          preserveComments: false
        },
        files: {
           '<%= paths.base %>scripts.js': [
             '<%= paths.js %>modernizr-2.6.2.min.js',
             '<%= paths.js %>jquery.min.js',
             '<%= paths.js %>main.js'
          ]
        }
      }
    },

    watch: {
      scripts: {
        files: ['<%= paths.js %>**/*.js','!<%= paths.js %>scripts.js'],
        tasks: ['uglify:dev'],
      },
      css: {
        files: ['<%= paths.less %>**/*.less'],
        tasks: ['less:dev'],
      }
    }
  });

// Run Development
  grunt.registerTask('dev', [
    'less:dev',
    'uglify:dev',
    // 'copy',
    'watch'
  ]);

  grunt.registerTask('prod', [
    'less:prod',
    'uglify:prod'
  ]);

};