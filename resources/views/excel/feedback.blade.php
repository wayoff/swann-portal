<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Content</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @if($feedbacks->isEmpty())
                <tr>
                    <td colspan="3" class="text-center">
                        No Feedback yet
                    </td>
                </tr>
            @else
                @foreach($feedbacks as $feedback)
                    <tr>
                        <td>{{$feedback->name}}</td>
                        <td>{{$feedback->content}}</td>
                        <td>{{$feedback->created_at}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</body>
</html>