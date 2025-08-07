@extends('admin.layouts.master')
@section('title', 'Plant-Identifications')
@section('style')
    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Segoe UI', sans-serif;
        }

        .container {
            max-width: 100%;
            margin: 0px auto;
            padding: 0 20px;
            margin-bottom: 30px;
        }

        .result-header {
            text-align: center;
            margin-bottom: 40px;
            padding-top: 20px;
        }

        .result-header h1 {
            font-size: 1.8rem;
            color: #2e7d32;
            margin-bottom: 10px;
        }

        .confidence {
            display: inline-block;
            background-color: #d0f0d0;
            color: #1a6e1a;
            font-size: 0.9rem;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 20px;
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

        .icon-green {
            color: #2e7d32 !important;
        }

        .icon-lightgreen {
            color: #31b337 !important;
        }

        /* Plant, Healthy */
        .icon-blue {
            color: #0288d1 !important;
        }

        /* Water */
        .icon-yellow {
            color: #fbc02d !important;
        }

        /* Sunlight */
        .icon-red {
            color: #c62828 !important;
        }

        .icon-lightred {
            color: #f04848 !important;
        }

        /* Disease, Danger */
        .icon-purple {
            color: #8e24aa !important;
        }

        /* Care */
        .icon-brown {
            color: #6d4c41 !important;
        }

        /* Region */
        .icon-grey {
            color: #607d8b !important;
        }

        /* Family */
        .icon-teal {
            color: #00796b !important;
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

            .icon-green {
                color: #2e7d32 !important;
            }

            .icon-lightgreen {
                color: #31b337 !important;
            }


            /* Plant, Healthy */
            .icon-blue {
                color: #0288d1 !important;
            }

            /* Water */
            .icon-yellow {
                color: #fbc02d !important;
            }

            /* Sunlight */
            .icon-red {
                color: #c62828 !important;
            }

            .icon-lightred {
                color: #f04848 !important;
            }

            /* Disease, Danger */
            .icon-purple {
                color: #8e24aa !important;
            }

            /* Care */
            .icon-brown {
                color: #6d4c41 !important;
            }

            /* Region */
            .icon-grey {
                color: #607d8b !important;
            }

            /* Family */
            .icon-teal {
                color: #00796b !important;
            }

            /* General info */
        }
    </style>
@endsection

@section('content')
    <div class="container">

        <!-- Header -->
        <div class="result-header">
            <h1>AI Plant Detection Result</h1>
            <div class="confidence">Confidence: <span class="value">{{ $plantIdentification->confidence_level }} %</span>
            </div>
        </div>

        <!-- Info Card with Spacing -->
        <div class="info-card">

            <div class="info-row">
                <span class="label">
                    <i class="fas fa-leaf icon-green"></i> Plant Name:
                </span>
                <span class="value">{{ $plantIdentification->plant_name ?? 'N/A' }}</span>
            </div>

            <div class="info-row">
                <span class="label">
                    <i class="fas fa-seedling icon-lightgreen"></i> Common Name:
                </span>
                <span class="value">{{ $plantIdentification->common_name ?? 'N/A' }}</span>
            </div>

            <div class="info-row">
                <span class="label">
                    <i class="fas fa-flask icon-teal"></i> Scientific Name:
                </span>
                <span class="value">{{ $plantIdentification->scientific_name ?? 'N/A' }}</span>
            </div>

            <div class="info-row">
                <span class="label">
                    <i class="fas fa-virus icon-red"></i> Disease Name:
                </span>
                <span class="value">{{ $plantIdentification->disease_name ?? 'N/A' }}</span>
            </div>

            <div class="info-row">
                <span class="label">
                    <i class="fas fa-heartbeat icon-lightred"></i> Health Status:
                </span>
                <span class="value">{{ $plantIdentification->health_status ?? 'N/A' }}</span>
            </div>

            <div class="info-row">
                <span class="label">
                    <i class="fas fa-tree icon-grey"></i> Family:
                </span>
                <span class="value">{{ $plantIdentification->family ?? 'N/A' }}</span>
            </div>

            <div class="info-row">
                <span class="label">
                    <i class="fas fa-map-marker-alt icon-brown"></i> Native Region:
                </span>
                <span class="value">{{ $plantIdentification->native_region ?? 'N/A' }}</span>
            </div>

            <div class="info-row">
                <span class="label">
                    <i class="fas fa-tint icon-blue"></i> Water Needs:
                </span>
                <span class="value">{{ $plantIdentification->water_needs ?? 'N/A' }}</span>
            </div>

            <div class="info-row">
                <span class="label">
                    <i class="fas fa-sun icon-yellow"></i> Sunlight Needs:
                </span>
                <span class="value">{{ $plantIdentification->sunlight_needs ?? 'N/A' }}</span>
            </div>

            <div class="info-row">
                <span class="label">
                    <i class="fas fa-skull-crossbones icon-red"></i> Toxicity:
                </span>
                <span class="value">{{ $plantIdentification->toxicity ?? 'N/A' }}</span>
            </div>

            <div class="info-row">
                <span class="label">
                    <i class="fas fa-hand-holding-heart icon-purple"></i> Care Recommendation:
                </span>
                <span class="value">{{ $plantIdentification->care_recommendation ?? 'N/A' }}</span>
            </div>
        </div>
    </div>
@endsection
