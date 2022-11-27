$(function() {
  'use strict';

  if($('#datePickerExample1').length) {
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#datePickerExample1').datepicker({
      format: "yyyy-mm-dd",
      todayHighlight: true,
      autoclose: true,
      language: 'tr'
    });
    $('#datePickerExample1').datepicker('setDate', today);
  }

  if($('#datePickerExample2').length) {
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#datePickerExample2').datepicker({
      format: "yyyy-mm-dd",
      todayHighlight: true,
      autoclose: true,
      language: 'tr'
    });
    $('#datePickerExample2').datepicker('setDate', today);
  }

  if($('#datePickerExample3').length) {
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#datePickerExample3').datepicker({
      format: "yyyy-mm-dd",
      todayHighlight: true,
      autoclose: true,
      language: 'tr'
    });
    $('#datePickerExample3').datepicker();
  }

  if($('#datePickerExample4').length) {
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#datePickerExample4').datepicker({
      format: "yyyy-mm-dd",
      todayHighlight: true,
      autoclose: true,
      language: 'tr'
    });
    $('#datePickerExample4').datepicker();
  }
});