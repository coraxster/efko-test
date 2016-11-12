/**
 * Created by rockwith on 13.11.16.
 */



$('#addIssue').click(function () {
    issue = $('[name="issue"]').val();
    solution = $('[name="solution"]').val();
    $.post('/tasks/add', {
        'issue':issue,
        'solution':solution
    }).done(function( data ) {
        if (data == 'ok'){
            $('.tasks-list tbody').append('<tr><td>'+issue+'</td><td>'+solution+'</td><td></td></tr>');
        }else{
            alert('Ошибка');
            console.log(data);
        }
    });
});


$('[name="rate"]').on('change', function () {
    rate = $(this).val();
    task_id = $(this).attr('task-id');
    $.post('/tasks/rate', {
        'id':task_id,
        'rate':rate
    }).done(function( data ) {
        if (data == 'ok'){

        }else{
            alert('Ошибка');
            console.log(data);
        }
    });
});