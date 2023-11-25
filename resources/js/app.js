import './bootstrap';

$('#message_form').on('submit', function () {
    $(this).find('input[type="submit"]')
        .attr('disabled', 'disabled');
});

Echo.channel('messages-channel').listen('MessageWasReceived', function (data) {
    let message = data.message;
    let html = `<tr>
                    <td>${ message.id }</td>
                    <td>${ message.name }</td>
                    <td>${ message.email }</td>
                    <td>${ message.message }</td>
                    <td></td>
                    <td></td>
                    <td>
                        <form action="/messages/edit/${ message.id }" method="GET" style="display: inline;">
                            <button type="submit" style="cursor: pointer;">Edit</button>
                        </form>
                        |
                        <form action="/messages/destroy/${ message.id }" method="POST" style="display: inline;">
                            <input type="hidden" name="_token" value="${ window.Laravel.csrfToken }" />
                           <input type="hidden" name="_methos" value="DELETE" />
                            <button type="submit" style="cursor: pointer;">Delete</button>
                        </form>
                    </td>
                </tr>`;
    console.log(message);
    $(html).hide().prependTo('tbody').fadeIn();
});
