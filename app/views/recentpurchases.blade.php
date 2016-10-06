@extends('admin.layout')
@section('title')
    <title>All Purchases</title>
@stop
@section('content')


    <table class="text-table">
        <caption>

            <h4>{{$title}} Image Downloads and Sales </h4>
            {{$purchases->links()}}
        </caption>
        <tr>
            <th>Id</th>
            <th>Email</th>
            <th>Cardholder</th>
            <th>Purchase No.</th>
            <th>Purchase</th>
            <th>Dollars</th>
            <th>Date - Time</th>
        </tr>
        <? foreach ($purchases as $row) : ?>

        <tr>
            <td>
                {{$row->id}}
            </td>
            <td>
                {{$row->email}}
            </td>
            <td>
                {{$row->cardholder_name}}
            </td>
            <td>
                {{$row->purchase_number}}
            </td>
            <td>
                {{$row->purchase}}
            </td>
            <td>
                {{number_format($row->amount/100,2)}}
            </td>
            <td>
                <?
                    $date = new DateTime($row->created_at);
                    $date->setTimezone(new DateTimeZone('Australia/Brisbane'));
                    echo ($date->format('Y-m-d H:i:s'));
                    ?>
            </td>
        </tr>
        <? endforeach; ?>

    </table>
@stop
@section('footer')

@stop
