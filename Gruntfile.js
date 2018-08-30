module.exports = function (grunt) {
/*  Get familiar with grunt

    grunt.registerTask('speak', function () {
       console.log("I am Speaking");
    });
    grunt.registerTask('speak1', function () {
       console.log("I am Speaking 1");
    });
    grunt.registerTask('hello', function () {
       console.log("Hello World I am default");
    });
    grunt.registerTask('both', ['speak', 'speak1']);
    grunt.registerTask('default', ['hello']);
*/
    grunt.initConfig({

        /* gereral x*/
        concat: {
          css:{
              src:['styles/format.css', 'styles/components.css'],
              dest: 'styles/styles.css',
          },
          js:{
              src:['script/functions.js', 'script/googleBooksAPI.js'],
              dest: 'script/scripts.js'

          }
        },
        watch: {
            scripts: {
                css:{
                    files: ['styles/styles.css'],
                    tasks: ['autoprefixer','purifycss','csso'],
                },
                js:{
                    files: ['script/scripts.js'],
                    tasks: ['autoprefixer','purifycss','csso'],
                }
            }
        },

        /* CSS */
        autoprefixer: {
            your_target: {
                file: {
                    'styles/styles.pref.css': ['styles/styles.css']
                }
            }
        },
        purifycss: {
            target: {
                src: ['./*.php', 'doc/*.php'],
                css: ['styles/styles.pref.css'],
                dest: 'styles/styles.purr.css',
            }
        },
        csso: {
            compress: {
                options: {
                    report: 'gzip'
                },
                files: {
                    'styles/styles.min.css': ['styles/styles.purr.css']
                }
            }
        },

        /* Images */
        image: {
            static: {
                options: {
                    optipng: true,
                    pngquant: true,
                    zopflipng: true,
                    jpegRecompress: true,
                    mozjpeg: true,
                    guetzli: false,
                    gifsicle: true,
                    svgo: true
                },
            },
            dynamic: {
                files: [{
                    expand: true,
                    cwd: 'images/',
                    src: ['**/*.{png,jpg,gif,svg}'],
                    dest: 'images/comp/'
                }]
            }
        }

    });

    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-purifycss');
    grunt.loadNpmTasks('grunt-image');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-concat');


};