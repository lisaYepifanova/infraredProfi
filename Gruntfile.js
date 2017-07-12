module.exports = function (grunt) {
    require('load-grunt-tasks')(grunt); // npm install --save-dev load-grunt-tasks
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        concat: {
            options: {
                separator: ';'
            },
            compass: {
                options: {
                    require: 'susy'
                }
            },
            dist: {
                src: ['js/scripts/*.js'],
                dest: 'js/build.js',
            }
        },

        uglify: {
            dist: {
                files: {
                    'js/build.min.js': ['js/build.js']
                }
            }
        },

        includePaths: [
            'node_modules/node-normalize-scss',
            'node_modules/sass-toolkit/stylesheets',
            'node_modules/breakpoint-sass/stylesheets',
            'node_modules/bootstrap-sass/assets',

        ],

        imagemin: {
            options: {
                cache: false
            },

            dist: {
                files: [{
                    expand: true,
                    cwd: 'img/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'img/'
                }]
            }
        },

        sass: {
            options: {
                sourceMap: false,
                compress: true,
                check: true,
                style: 'expanded',
            },
            build: {
                files: {
                    'css/style.css': 'sass/style.scss',
                }
            }
        },

        cssmin: {
            options: {
                mergeIntoShorthands: false,
                roundingPrecision: -1
            },
            target: {
                files: {
                    'css/style.min.css': 'css/style.css',
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-sass');
    //grunt.loadNpmTasks('grunt-contrib-cssmin');

    grunt.registerTask('default', ['concat', 'uglify', 'imagemin', 'sass'/**, 'cssmin'*/]);

};
