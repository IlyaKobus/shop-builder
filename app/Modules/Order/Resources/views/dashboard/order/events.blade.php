<table class="table order-events-table">
    <thead>
    <tr>
        <th>Date Added</th>
        <th>Comment</th>
        <th>Status</th>
        <th>Customer Notified</th>
    </tr>
    </thead>
    <tbody>

    @foreach($order->events as $event)
        <tr>
            <td>{{ date('d/m/Y', strtotime($event->created_at)) }}</td>
            <td>{{ $event->comment }}</td>
            <td>{{ ucfirst($event->status->name) }}</td>
            <td>{{ $event->is_notify_customer ? 'Yes' : 'No' }}</td>
        </tr>
    @endforeach

    </tbody>
</table>
