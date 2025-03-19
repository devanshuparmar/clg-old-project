<table cellspacing="10rem">
    <tr>
        <th>
            student-id
        </th>
        <th>
            name
        </th>
        <th>
            enrollment-number
        </th>
        <th>
            email
        </th>
        <th>
            contact-details
        </th>
        <th>
            password
        </th>
        <th>
            course
        </th>
        <th>
            semester
        </th>
        <th>
            division
        </th>
        <th align="center" colspan="2">
            Action
        </th>
    </tr>
    
    @foreach($data as $i)
    <tr>
        <td>
            {{$i -> idstudents}}
        </td>
        <td>
            {{$i -> course}}
        </td>
        <td>
            {{$i -> semester}}
        </td>
        <td>
            {{$i -> division}}
        </td>
        <td>
            {{$i -> enrollment_number}}
        </td>
        <td>
            {{$i -> email}}
        </td>
        <td>
            {{$i -> password}}
        </td>
        <td>
            {{$i -> contact_details}}
        </td>
        <td>
            {{$i -> name}}
        </td>
        <td>
            <a href="/editstudent/{{$i -> idstudents}}"> Edit </a>
        </td>
        <td>
            <a href="/deletestudent/{{$i -> idstudents}}"> Delete </a>
        </td>
    </tr>
    @endforeach
</table>
@if($message=Session::get('success'))
    <script>
        alert('{{$message}}')
    </script>
@endif 