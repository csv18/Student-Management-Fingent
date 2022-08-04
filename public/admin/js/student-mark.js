$(document).ready(function() {
    loadDataTableForStudentMark();
    default_term_id = $('#default_term_id').val();
    default_term_name = $('#default_term_name').val();
    if(default_term_id){
        option = new Option(default_term_name, default_term_id, true, true);
        $('#js-term').append(option).trigger('change');
    }
    default_student_id = $('#default_student_id').val();
    default_student_name = $('#default_student_name').val();
    if(default_student_id){
        option = new Option(default_student_name, default_student_id, true, true);
        $('#js-student').append(option).trigger('change');
    }
});
function loadDataTableForStudentMark(){
  table = $('#student-mark-details-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: $('#route-for-user').val()+'/student-mark/show',
      columns: [
          {data: 'DT_RowIndex', orderable: false, searchable: false},
          {data: 'student_name',name:'student_name', orderable: false, searchable: false},
          {data: 'maths', orderable: false, searchable: false},
          {data: 'science', orderable: false, searchable: false},
          {data: 'history', orderable: false, searchable: false},
          {data: 'term_name',name:'term_name', orderable: false, searchable: false},
          {data: 'total_mark',orderable: false, searchable: false},
          {data: null,
               render:function(row){
               return moment(row.created_at).format('Do MMM  YYYY hh:mm A');
          },orderable: false, searchable: false},
          {data: null,
              render:function(row){
                 return  `<div class="action-buttons text-center">	<a class="u-link mr-2 primary-btn small tr-bg"  title="Edit"  href="`+$('#route-for-user').val()+`/student-mark/`+row.id+`/edit">
                      <i class="fa fa-eye"></i> Edit
                  </a>
                  <a class="u-link mr-2 primary-btn small tr-bg" href="#"  title="Delete"  onclick="deleteStudentMark(`+row.id+`)">
                      <i class="fa fa-trash"></i> Delete
                  </a>
                  </div>`;
          },orderable: false, searchable: false},
      ],
      pagingType: "full_numbers",
      "language": {
          "paginate": {
              "previous": '<span aria-hidden="true" class="material-icons">chevron_left</span>'+
                          '<span class="sr-only">Prev</span>',
              "next": '<span class="sr-only">Next</span>'+
                      '<span aria-hidden="true" class="material-icons">chevron_right</span>',
              "first": '<span aria-hidden="true" class="material-icons">first_page</span>'+
                       '<span class="sr-only">First</span>',
              "last": '<span class="sr-only">Last</span>'+
                      '<span aria-hidden="true" class="material-icons">last_page</span>',
          }
      }
  });
}

$('#student-mark-add-form').validate({
  rules: {
      maths: {
          required: true,
      },
      science: {
          required: true,
      },
      history: {
          required: true,
      },
      term_id: {
          required: true,
      },
      student_id: {
          required: true,
      },
  },
  errorElement: 'span',
  submitHandler: function(form,event) {
      //
      var formData = new FormData($(form)[0]);
      $('.error').html('');
      var submitButton=$(form).find('[type=submit]');
      var current_btn_text=submitButton.html();
      button_loading_text = 'Saving...';
      // Create
      $.ajax({
          type: "POST",
          url: $('#route-for-user').val()+'/student-mark',
          contentType: false,
          processData: false,
          data: formData,
          cache: false,
          beforeSend: function () {
              submitButton.html(`
                  <span class="spinner-border spinner-border-sm"></span>
                  `+button_loading_text+`
              `).attr('disabled',true);
          },
          success: function(response)
          {
              if(response.status){
                  showMessage('success',response.message);
                  setTimeout(function(){
                      window.location = response.return_url;
                  },500);
              }else{
                  showMessage('warning',response.message);
              }
          },

          error: function (response) {
              submitButton.html(current_btn_text).attr('disabled',false);
              if(response.responseJSON.errors){
                  $.each(response.responseJSON.errors, function(i,v) {
                      element=$(form).find('[name='+i+']');
                      element.addClass('is-invalid');
                      if( $(form).find('#'+ i +'-error').length){
                          $(form).find('#'+ i +'-error').html(v).show();
                      }else{
                          element.closest('.form-group').
                          append(`<span id="`+i+`-error" class="error invalid-feedback">`+v+`</span>`);
                          $('.error').show();
                      }
                      element.attr('aria-invalid',true);
                      element.attr("area-describedby",i+"-error");
                      element.focus();
                  });
              }
              else{
                  showMessage('warning','Something went wrong...');
              }
          },
          complete:function(){
              submitButton.html(current_btn_text).attr('disabled',false);
          }
      });
      event.preventDefault();
  },
  highlight: function(element, errorClass, validClass) {
      $(element).addClass('is-invalid');
  },
  unhighlight: function(element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
  },
  errorPlacement: function(label, element) {
      if (element.hasClass('web-select2')) {
        label.insertAfter(element.next('.select2-container')).addClass('mt-2 text-danger');
        select2label = label
      } else {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      }
    },
});

$('#student-mark-edit-form').validate({
  rules: {
        maths: {
            required: true,
        },
        science: {
            required: true,
        },
        history: {
            required: true,
        },
        term_id: {
            required: true,
        },
        student_id: {
            required: true,
        },
        student_mark_id: {
            required: true,
        },
  },
  errorElement: 'span',
  submitHandler: function(form,event) {
      //
      var formData = new FormData($(form)[0]);
      $('.error').html('');
      var submitButton=$(form).find('[type=submit]');
      var current_btn_text=submitButton.html();
      button_loading_text = 'Saving...';
      var student_mark_id = $(form).find('input[name=student_mark_id]').val();
      // Create
      $.ajax({
          type: "POST",
          url: $('#route-for-user').val()+'/student-mark/'+student_mark_id,
          contentType: false,
          processData: false,
          data: formData,
          cache: false,
          beforeSend: function () {
              submitButton.html(`
                  <span class="spinner-border spinner-border-sm"></span>
                  `+button_loading_text+`
              `).attr('disabled',true);
          },
          success: function(response)
          {
              if(response.status){
                  showMessage('success',response.message);
                  setTimeout(function(){
                      window.location = response.return_url;
                  },500);
              }else{
                  showMessage('warning',response.message);
              }
          },

          error: function (response) {
              submitButton.html(current_btn_text).attr('disabled',false);
              if(response.responseJSON.errors){
                  $.each(response.responseJSON.errors, function(i,v) {
                      element=$(form).find('[name='+i+']');
                      element.addClass('is-invalid');
                      if( $(form).find('#'+ i +'-error').length){
                          $(form).find('#'+ i +'-error').html(v).show();
                      }else{
                          element.closest('.form-group').
                          append(`<span id="`+i+`-error" class="error invalid-feedback">`+v+`</span>`);
                          $('.error').show();
                      }
                      element.attr('aria-invalid',true);
                      element.attr("area-describedby",i+"-error");
                      element.focus();
                  });
              }
              else{
                  showMessage('warning','Something went wrong...');
              }
          },
          complete:function(){
              submitButton.html(current_btn_text).attr('disabled',false);
          }
      });
      event.preventDefault();
  },
  highlight: function(element, errorClass, validClass) {
      $(element).addClass('is-invalid');
  },
  unhighlight: function(element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
  }
});

function deleteStudentMark(id){
  var block = $(this).parent().parent().parent().parent();
  swal({
  title: "Confirm?",
  text: "Are you sure, do yo want to delete the student mark ?",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "red",
  confirmButtonText: "Yes, I am sure!",
  cancelButtonText: "No, cancel it!"
  }).then(function (isConfirm) {
      if (isConfirm) {
          $.ajax({
              type: "DELETE",
              url: $('#route-for-user').val()+'/student-mark/'+id,
              data:
                  {
                      'id':id,
                  },
              beforeSend: function() {

                  $(block).block({
                      message: 'Please wait...',
                      overlayCSS: {
                          backgroundColor: '#fff',
                          fontsize:'20px',
                          opacity: 0.8,
                          cursor: 'wait',
                          'box-shadow': '0 0 0 1px #ddd',
                          "background-repeat": "no-repeat" ,
                          "align-items": "center"
                      },
                      css: {
                          border: 0,
                          padding: 0,
                          backgroundColor: 'none'
                      }
                  });
              },
              success: function (data) {
                  table.ajax.reload();
                  showMessage('success',"Student mark deleted successfully");
              },
              error: function(data) {
                  showMessage('warning','Something went wrong...');
              }
          });
      }
  },
  function() {
  console.log('canceled');
  });
}
$("#js-term").select2({
    placeholder: "Select Term",
    allowClear: true,
    ajax: {
        url: $('#route-for-user').val()+'/student/search/term-list-suggestion-ajax',
        dataType: 'json',
        data: function (term, page) {
            return {
                q: term.term
            }
        },
        delay:250,
    }
});
$("#js-student").select2({
    placeholder: "Select Student",
    allowClear: true,
    ajax: {
        url: $('#route-for-user').val()+'/student/search/student-list-suggestion-ajax',
        dataType: 'json',
        data: function (term, page) {
            return {
                q: term.term
            }
        },
        delay:250,
    }
});
