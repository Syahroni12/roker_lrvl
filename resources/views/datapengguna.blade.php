@extends('templating.template')
@section('title', 'Data Pengguna')
@section('menu', 'Data Pengguna')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <br>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahdata">
                        <i class="bx bxs-user-plus"></i> tambah data
                    </button>
                    <br>
                    <br>
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>Nama</th>
                                <th>Email</th>

                                <th>No telfon</th>
                                <th>Hak Akses</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $index = 1;
                            @endphp
                            @foreach ($pengguna as $item)
                                <tr>
                                    <td class="text-center">{{ $index }}</td>
                                    <td class="text-center">{{ $item->nama }}</td>

                                    <td class="text-center">{{ $item->email }}</td>
                                    <td class="text-center">{{ $item->no_telfon }}</td>
                                    <td class="text-center">{{ $item->akses }}</td>
                                    <td class="text-center"><button type="button" class="btn btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#detaildata"onclick="detail({{ $item }})">
                                            <i class="ri-eye-line"></i>
                                        </button> |
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editdata"onclick="edit({{ $item }})">
                                            <i class="ri-edit-2-line"></i>
                                        </button> |
                                        <button type="button" class="btn btn-danger delete-btn" data-id="{{ $item->id }}">
                                            <i class="bi bi-trash-fill"></i> Hapus
                                        </button>


                                    </td>




                                </tr>

                                {{-- <td class="text-center">
         
                <button  type="button" class="btn btn-primary mr-2 mb-5" data-toggle="modal"
                data-target="#uploadsk">Daftar PROGRAM </button></td> --}}

                                @php
                                    $index++;
                                @endphp
                            @endforeach



                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="detaildata" tabindex="-1" aria-labelledby="detaildataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detaildataLabel">Detail Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label class=" col-form-label">Nama Pengguna</label>
                        <input type="text" class="form-control" readonly id="nama">
                    </div>
                    <div class="form-group mb-3">
                        <label class=" col-form-label">Email Pengguna</label>
                        <input type="text" class="form-control" readonly id="email">
                    </div>
                    <div class="form-group mb-3 mb">
                        <label class=" col-form-label">username Pengguna</label>
                        <input type="text" class="form-control" readonly id="username">
                    </div>
                    <div class="form-group mb-3">
                        <label class=" col-form-label">No telfon Pengguna</label>
                        <input type="text" class="form-control" readonly id="notelfon">
                    </div>
                    <div class="form-group mb-3">
                        <label class=" col-form-label">Alamat Pengguna</label>
                        <input type="text" class="form-control" readonly id="alamat">
                    </div>
                    <div class="form-group mb-3">
                        <label class=" col-form-label">Hak Akses</label>
                        <input type="text" class="form-control" readonly id="akses">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editdata" tabindex="-1" aria-labelledby="editdataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editdataLabel">edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{  route('pengguna.editpegawai') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label class=" col-form-label">Nama Pengguna</label>
                            <input type="text" class="form-control" id="namaa" name="nama">
                        </div>
                        <div class="form-group mb-3">
                            <label class=" col-form-label">Email Pengguna</label>
                            <input type="text" class="form-control" id="emaill" name="email">
                        </div>
                        <div class="form-group mb-3 mb">
                            <label class=" col-form-label">username Pengguna</label>
                            <input type="text" class="form-control" id="bacott" name="username">
                        </div>
                        <div class="form-group mb-3">
                            <label class=" col-form-label">No telfon Pengguna</label>
                            <input type="text" class="form-control" id="notelfonn" name="no_telfon">
                        </div>
                        <div class="form-group mb-3">
                            <label class=" col-form-label">Alamat Pengguna</label>
                            <input type="text" class="form-control" id="alamatt" name="alamat">
                        </div>
                        <div class="form-group mb-3">
                            <label class=" col-form-label">Hak Akses</label>
                            <select class="form-control" name="akses">
                             
                                <option value="admin"id="aksess">admin</option>
                                <option value="pegawai"id="aksess">pegawai</option>
                                <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                            </select>
                        </div>
                        <input type="hidden" name="id" id="idpegawai">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="tambahdataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahdataLabel"> Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('pengguna.tambahpegawai') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label class=" col-form-label">Nama Pengguna</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="form-group mb-3">
                            <label class=" col-form-label">Email Pengguna</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="form-group mb-3 mb">
                            <label class=" col-form-label">username Pengguna</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group mb-3 mb">
                            <label class=" col-form-label">Password Pengguna</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group mb-3">
                            <label class=" col-form-label">No telfon Pengguna</label>
                            <input type="number" class="form-control" name="no_telfon">
                        </div>
                        <div class="form-group mb-3">
                            <label class=" col-form-label">Alamat Pengguna</label>
                            <input type="text" class="form-control" name="alamat">
                        </div>
                        <div class="form-group mb-3">
                            <label class=" col-form-label">Hak Akses</label>
                            <select class="form-control" name="akses">
                                <option value="">Pilih salah satu</option>
                                <option value="admin">admin</option>
                                <option value="pegawai">pegawai</option>

                                <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function detail(data) {
            console.log(data);
            document.getElementById("nama").value = data.nama;
            document.getElementById("email").value = data.email;
            document.getElementById("alamat").value = data.alamat;
            document.getElementById("username").value = data.username;
            document.getElementById("notelfon").value = data.no_telfon;
            document.getElementById("akses").value = data.akses;
        }

        function edit(data) {
            console.log(data);
            document.getElementById("idpegawai").value = data.id;
            document.getElementById("namaa").value = data.nama;
            document.getElementById("emaill").value = data.email;
            document.getElementById("alamatt").value = data.alamat;
            document.getElementById("bacott").value = data.username;
            document.getElementById("notelfonn").value = data.no_telfon;
            var aksesSelect = document.getElementsByName('akses')[0];
            for (var i = 0; i < aksesSelect.options.length; i++) {
                if (aksesSelect.options[i].value === data.akses) {
                    aksesSelect.options[i].selected = true;
                    break;
                }
            }
        }

        document.addEventListener('click', function(e) {
        if (e.target.classList.contains('delete-btn')) {
            const itemId = e.target.getAttribute('data-id');

            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: 'Apa kamu yakin ingin menghapus item ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim permintaan penghapusan ke endpoint yang sesuai di controller
                    fetch('/data/' + itemId, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                        
                            Swal.fire(
                            'Terhapus!',
                            'Item berhasil dihapus.',
                            'success'
                        ).then(() => {
                            window.location.reload();
                        });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                }
            });
        }
    });
    </script>
@endsection
{{-- <tbody>
 
{{-- </tbody> --}}
