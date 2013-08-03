'use strict';
module.exports = function(grunt) {

    grunt.initConfig({
        // Read in the package json
        pkg: grunt.file.readJSON('package.json'),

        // Lint the JS
        jshint: {
            options: {
                // jshintrc: '.jshintrc'
            },
            all: [
                'app/webroot/js/custom.js'
            ]
        },

        // Use Twitter's Recess to compile and compress LESS files
        recess: {
            production: {
                options: {
                    compile: true,
                    compress: true
                },
                files: {
                    'app/webroot/css/site.min.css': [
                        // Files need to go reverse order, i.e. first in last out
                        // 'app/webroot/less/custom/custom.less',
                        'app/webroot/less/bootstrap/bootstrap.less'
                    ]
                }
            }
        },

        // Use Uglify to concatinate and compress all the JS files
        uglify: {
            options: {
                banner:
                    '/**\n' +
                    ' * <%= pkg.name %> <%= grunt.template.today("mm/dd/yyyy") %>\n' +
                    ' * Version: <%= pkg.version %>\n' +
                    ' */\n',
                report: 'gzip'
            },
            production: {
                files: {
                    'app/webroot/js/site.min.js': [
                        'app/webroot/js/bootstrap/transition.js',
                        'app/webroot/js/bootstrap/alert.js',
                        'app/webroot/js/bootstrap/button.js',
                        'app/webroot/js/bootstrap/collapse.js',
                        'app/webroot/js/bootstrap/dropdown.js',
                        'app/webroot/js/bootstrap/modal.js'
                        // 'app/webroot/js/custom.js'
                    ]
                }
            }
        },

        // Minify the images
        imagemin: {
            production: {
                files: {
                    // 'app/webroot/img/elsinore_logo.jpg': 'app/webroot/img/uncompressed/elsinore_logo.jpg'
                }
            }
        },

        // Clean all the created files
        clean: {
            css: [
                'app/webroot/css/site.min.css'
            ],
            js: [
                'app/webroot/js/site.min.js'
            ],
            all: [
                'app/webroot/css/site.min.css',
                'app/webroot/js/site.min.js'
            ]
        }
    });

    // Load tasks
    // grunt.loadTasks('tasks');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-recess');

    // Register tasks
    grunt.registerTask('default', [
        'clean:all',
        'recess:production',
        'uglify:production',
    ]);
    
    grunt.registerTask('css', [
        'clean:css',
        'recess:production'
    ]);

    grunt.registerTask('admin', [
        'clean:admin',
        'recess:admin',
        'uglify:admin',
    ]);

    grunt.registerTask('all', [
        'clean',
        'recess',
        'uglify',
        'imagemin'
    ]);

};