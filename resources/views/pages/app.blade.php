<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TV Information | Prodi Rekayasa Sistem Komputer</title>
    <link rel="stylesheet"
        href="{{ url('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

    <link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css') }}"
        rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}" />
    <style>
        hr {
            border: 1px;
            border-top: 3px double #8c8c8c;
        }



        #isi,
        h1 {
            text-align: center;
            font-size: 50px;
        }

        #status {
            margin-top: 30px;
            text-align: center;
        }

        #teks-status {
            font-size: 50px;
            padding-top: 30px;
            padding-bottom: 30px;
            padding-right: 100px;
            padding-left: 100px;
            border-radius: 60px;
        }

        #teks-prodi {
            margin-top: 40px;
        }

        #status-dosen {
            font-size: 20px;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-right: 30px;
            padding-left: 30px;
            border-radius: 60px;
        }

        .gambar-prodi {
            margin-top: 30px;
        }

        #tag-box {
            font-size: 25px;
        }
    </style>

</head>

<body style="background-image: url('{{ asset('assets/images/bg-siskom.png') }}') ">
    <div class="container">
        <div class="row" id="header">
            <div class="col-sm-4">
                <img class="gambar-prodi" src="{{ asset('assets/images/logo-gabung.png') }}" alt="logo-kemendikbud.png"
                    width="380" />
            </div>
            <div class="col-sm-8" id="teks-prodi">
                <h3>PROGRAM STUDI REKAYASA SISTEM KOMPUTER</h3>
                <h3>FAKULTAS MATEMATIKA DAN ILMU PENGETAHUAN ALAM</h3>
            </div>
        </div>
    </div>

    <hr />

    <div class="row" id="isi" style="margin-top: 50px">
        <h1>RUANG DOSEN</h1>
    </div>
    <div id="status">

        <span id="teks-status" class="badge text-bg-warning shadow">{{ $itemRuang ? $itemRuang->status : '-' }}</span>
    </div>

    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" style="margin-top: 60px">
        <div class="carousel-inner">

            <div class="carousel-item active" data-bs-interval="5000">
                <div class="contain">
                    @foreach ($firstItems as $item)
                        <div class="box shadow">
                            <div class="top d-flex justify-content-center">
                                <span id="tag-box">{{ $item->position }}</span>
                            </div>
                            <div class="content mt-4">
                                <img src="{{ Storage::url($item->image) }}" alt="" />
                                <strong>{{ $item->name }}</strong>
                                <p>{{ $item->nip }}</p>
                            </div>
                            <div class="text-center">
                                <div class="btn">
                                    <span id="status-dosen" class="badge text-bg-warning">{{ $item->status }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>



            @foreach ($remainingItems->chunk(4) as $chunk)
                <div class="carousel-item" data-bs-interval="5000">
                    <div class="contain">
                        @foreach ($chunk as $item)
                            <div class="box shadow">
                                <div class="top d-flex justify-content-center">
                                    <span id="tag-box">{{ $item->position }}</span>
                                </div>
                                <div class="content mt-4">
                                    <img src="{{ Storage::url($item->image) }}" alt="" />
                                    <strong>{{ $item->name }}</strong>
                                    <p>{{ $item->nip }}</p>
                                </div>
                                <div class="text-center">
                                    <div class="btn">
                                        <span id="status-dosen"
                                            class="badge @if ($item->status == 'TUGAS BELAJAR') text-bg-danger
                                            @else
                                                text-bg-warning @endif">{{ $item->status }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</body>
<script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js') }}"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script src="{{ url('https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js') }}"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js') }}"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

</html>
