@extends('layouts.admin')

@section('title') User Comments @endsection

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header bg-light">
                Striped Rows
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Sales</th>
                            <th>Price</th>
                            <th>Discount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td class="text-nowrap">Samsung Galaxy S8</td>
                            <td>31,589</td>
                            <td>$800</td>
                            <td>5%</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td class="text-nowrap">Google Pixel XL</td>
                            <td>99,542</td>
                            <td>$750</td>
                            <td>3%</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td class="text-nowrap">iPhone X</td>
                            <td>62,220</td>
                            <td>$1,200</td>
                            <td>0%</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td class="text-nowrap">OnePlus 5T</td>
                            <td>50,000</td>
                            <td>$650</td>
                            <td>5%</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td class="text-nowrap">Google Nexus 6</td>
                            <td>400</td>
                            <td>$400</td>
                            <td>7%</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection