@extends('admin.layouts.master')
@section('main-content')


                <div class="analytics">

                    <div class="card">
                        <div class="card-head">
                            <h2>100</h2>
                            <span class="las la-chart-bar"></span>
                        </div>
                        <div class="card-progress">
                            <h3>Total Sales</h3>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-head">
                            <h2>10</h2>
                            <span class="las la-shopping-cart"></span>
                        </div>
                        <div class="card-progress">
                            <h3>Total Orders</h3>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-head">
                            <h2>7</h2>
                            <span class="las la-users"></span>
                        </div>
                        <div class="card-progress">
                            <h3>Total Customers</h3>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-head">
                            <h2>5</h2>
                            <span class="las la-comment-dots"></span>
                        </div>
                        <div class="card-progress">
                            <h3>Total Messages</h3>
                        </div>
                    </div>
                </div>
                <div class="records table-responsive">
                    <h2 style="margin-top: 20px; margin-bottom:20px; text-align:center">Recent Orders</h2>
                    <div>
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><span ></span> USERNAME</th>
                                    <th><span ></span> FOOD</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#5033</td>
                                    <td>Anisha Acharya</td>
                                    <td>
                                      Pizza
                                    </td>
                                </tr>    
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            @endsection