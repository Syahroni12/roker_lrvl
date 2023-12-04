@extends('templating.template')
@section('title', 'Data Jenis Barang')
@section('menu', 'Data Jenis Barang')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <br>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahdata">
                       tambah data
                    </button>
                    <br>
                    <br>
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th class="text-center"> 
                                    #
                                </th>
                                <th class="text-center">Jenis Barang</th>
                              
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $index = 1;
                            @endphp
                            @foreach ($jenisbarang as $item)
                                <tr>
                                    <td class="text-center">{{ $index }}</td>
                                    <td class="text-center">{{ $item->nama_jenis }}</td>

                                 
                                    <td class="text-center">
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editdata"onclick="edit({{ $item }})">
                                            <i class="ri-edit-2-line"></i>
                                        </button> |
                                        <button type="button" class="btn btn-danger delete-btn" data-id="{{ $item->id }}">
                                            <i class="bi bi-trash-fill"></i>
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
  
    <div class="modal fade" id="editdata" tabindex="-1" aria-labelledby="editdataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editdataLabel">edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('jenisbarang.editjenis') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label class=" col-form-label">Nama Jenis</label>
                            <input type="text" class="form-control" id="namaa" name="nama_jenis">
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
                <form action="{{ route('jenisbarang.tambahjenis') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label class=" col-form-label">Nama Pengguna</label>
                            <input type="text" class="form-control" name="nama_jenis">
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
  

        function edit(data) {
            console.log(data);
            document.getElementById("idpegawai").value = data.id;
            document.getElementById("namaa").value = data.nama_jenis;
   
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
                    fetch('/hapusjenis/' + itemId, {
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
