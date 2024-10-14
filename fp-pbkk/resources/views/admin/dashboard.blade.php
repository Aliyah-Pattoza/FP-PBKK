<!DOCTYPE html>
<html lang="en">
@extends('layouts.app')

@section('content')
    <h1>Admin Dashboard</h1>
    <p>Welcome, {{ auth()->user()->nama_client }}!</p>
    <p>Here you can manage users, transactions, and more.</p>
@endsection
