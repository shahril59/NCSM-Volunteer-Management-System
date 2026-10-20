@extends('layout.app')
@section('content')

<title>View Customers</title>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<!-- Search / Filter Data -->
<h2>SEARCH / FILTER</h2>
<form method="GET" action="{{ route('viewcustomer') }}" style="margin-bottom: 20px;">

    <label for="search">Search by MyKad:</label>
    <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Enter all or part of MyKad ..">

    <label for="custstate">State:</label>
    <select name="custstate" id="custstate">
        <option value="">-- All States --</option>
        <option value="Johor" {{ request('custstate') == 'Johor' ? 'selected' : '' }}>Johor</option>
        <option value="Kedah" {{ request('custstate') == 'Kedah' ? 'selected' : '' }}>Kedah</option>
        <option value="Kelantan" {{ request('custstate') == 'Kelantan' ? 'selected' : '' }}>Kelantan</option>
        <option value="Melaka" {{ request('custstate') == 'Melaka' ? 'selected' : '' }}>Melaka</option>
        <option value="Negeri Sembilan" {{ request('custstate') == 'Negeri Sembilan' ? 'selected' : '' }}>Negeri Sembilan</option>
        <option value="Pahang" {{ request('custstate') == 'Pahang' ? 'selected' : '' }}>Pahang</option>
        <option value="Perak" {{ request('custstate') == 'Perak' ? 'selected' : '' }}>Perak</option>
        <option value="Perlis" {{ request('custstate') == 'Perlis' ? 'selected' : '' }}>Perlis</option>
        <option value="Pulau Pinang" {{ request('custstate') == 'Pulau Pinang' ? 'selected' : '' }}>Pulau Pinang</option>
        <option value="Sabah" {{ request('custstate') == 'Sabah' ? 'selected' : '' }}>Sabah</option>
        <option value="Sarawak" {{ request('custstate') == 'Sarawak' ? 'selected' : '' }}>Sarawak</option>
        <option value="Selangor" {{ request('custstate') == 'Selangor' ? 'selected' : '' }}>Selangor</option>
        <option value="Terengganu" {{ request('custstate') == 'Terengganu' ? 'selected' : '' }}>Terengganu</option>
        <option value="Wilayah Persekutuan Kuala Lumpur" {{ request('custstate') == 'Wilayah Persekutuan Kuala Lumpur' ? 'selected' : '' }}>Wilayah Persekutuan Kuala Lumpur</option>
        <option value="Wilayah Persekutuan Labuan" {{ request('custstate') == 'Wilayah Persekutuan Labuan' ? 'selected' : '' }}>Wilayah Persekutuan Labuan</option>
        <option value="Wilayah Persekutuan Putrajaya" {{ request('custstate') == 'Wilayah Persekutuan Putrajaya' ? 'selected' : '' }}>Wilayah Persekutuan Putrajaya</option>
    </select>

    <button type="submit">SEARCH</button>
    <a href="{{ route('viewcustomer') }}" style="margin-left: 10px;">Reset</a>
    <!-- reset link just navigate to viewcustomer default function. -->
</form>


<h2>CUSTOMER DATA</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>MyKad</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Postcode</th>
        <th>State</th>
        <th>Action: Update</th>
        <th>Action: Delete</th>
    </tr>

    @forelse($customers as $customer)
        <tr>
            <td>{{ $customer->custmykad }}</td>
            <td>{{ $customer->custname }}</td>
            <td>{{ $customer->custphonenum }}</td>
            <td>{{ $customer->custaddress }}</td>
            <td>{{ $customer->custpostcode }}</td>
            <td>{{ $customer->custstate }}</td>
            <td><a href="{{ route('editcustomer', $customer->custmykad) }}">Edit</a></td>
            <td><a href="{{ route('deletecustomerconfirm', $customer->custmykad) }}" style="color: red;">Delete</a></td>
        </tr>
    @empty
        <tr>
            <td colspan="8" style="text-align:center;">No records found.</td>
        </tr>
    @endforelse
</table>

@endsection
