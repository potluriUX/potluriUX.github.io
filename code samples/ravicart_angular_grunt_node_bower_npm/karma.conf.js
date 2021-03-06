module.exports = function (config) {
    config.set({

        basePath: './',

        files: [
            'bower_components/angular/angular.js',
            'bower_components/angular-mocks/angular-mocks.js',
            'src/**/*.js'
        ],

        autoWatch: true,

        frameworks: ['jasmine'],//jasmine to test our stuff

        browsers: ['Chrome'],

        plugins: [
            'karma-junit-reporter',//these are standard plugins
            'karma-chrome-launcher',
            'karma-firefox-launcher',
            'karma-phantomjs2-launcher',
            'karma-jasmine'
        ]
        
    });
};
