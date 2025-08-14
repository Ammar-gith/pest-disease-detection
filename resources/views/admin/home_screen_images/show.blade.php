@extends('admin.layouts.master')
@section('title', 'Home-Screen-Images')
@section('style')
    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Segoe UI', sans-serif;
        }

        .container {
            max-width: 100%;
            margin: 0px auto;
            padding: 20px 20px;
            margin-bottom: 30px;
        }

        .result-header {
            text-align: center;
            margin-bottom: 40px;

        }

        .result-header h1 {
            font-size: 1.8rem;
            color: #2e7d32;
            text-decoration: underline;
        }

        .info-card {
            background: #fbfdfa;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.06);
            font-size: 1rem;
            color: #333;
        }

        .info-row {
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
        }

        .label {
            font-weight: 600;
            color: #2e7d32;
            width: 300px;
        }

        .label i {
            margin-right: 10px;
            color: #2e7d32;
        }

        .value {
            flex: 1;
            color: #444;
        }

        /* General info */

        @media (max-width: 600px) {
            .info-card {
                padding: 20px;
                font-size: 0.95rem;
            }

            .label {
                width: 100%;
                margin-bottom: 4px;
                color: #2e7d32;


            }

            .label i {
                margin-right: 10px;
                color: #2e7d32;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <!-- Info Card with Spacing -->
        <div class="info-card">
            <!-- Header -->
            <div class="result-header">
                <h1>HOME SCREEN IMAGE</h1>
            </div>

            <div class="info-row text-center">
                <span class="value">
                    <img src="{{ asset('storage/' . $homeImage->image) }}" alt="Plant Image"
                        class="img-thumbnail rounded-circle shadow text-center"
                        style="width: 150px; height: 150px; object-fit: cover;">
                </span>
            </div>
            <div class="info-row text-center">
                <span class="label">
                    Image Title:
                </span>
                <span class="value text-bold">{{ $homeImage->image_title ?? 'N/A' }}</span>
            </div>

            <div class="info-row text-center">
                <span class="label">
                    Image Sub Title:
                </span>
                <span class="value">{{ $homeImage->image_sub_title ?? 'N/A' }}</span>
            </div>

        </div>
    </div>
@endsection
