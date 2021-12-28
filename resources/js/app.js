require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import $ from 'jquery';
window.$ = window.jQuery = $;

import 'jquery-ui/ui/widgets/datepicker.js';
$('#datepicker').datepicker();

var soc=0;
var stud=0;
var skl=0;

$('#addSoc').click(function() {
        $('.contact').append(`<input id="linked" type="text" class="inp-edit" placeholder="Social Net" name="inpLd[${soc++}]">`); // Add field html
    });

$('#addStudy').click(function() {
    $('.education').append(`<input  class="inp-edit"\n' +
        '                        placeholder="Degree name"\n' +
        '                        name="inpDegree[${stud}]"\n' +
        '                >\n'
        '                <input  class="inp-edit"\n' +
        '                        placeholder="University name"\n' +
        '                        name="inpUniversity[${stud}]"\n' +
        '                >\n'
        '                <input  class="inp-edit"\n' +
        '                        placeholder="Period"\n' +
        '                        name="inpPeriod[${stud++}]"\n' +
        '                >`); // Add field html
});

$('#addSkill').click(function() {
    $('.skills').append(`<input type="text"\n' +
        '                       id="skillInput"\n' +
        '                       class="inp-edit"\n' +
        '                       placeholder="php, html, css, javascript"\n' +
        '                       name="inpSkill[${skl++}]"\n' +
        '                >`); // Add field html
});
