<x-admin-layout title="List Pustakawan">
    <div class="card shadow mb-4">
        <div class="card-body">
            @if($success = session()->get('success'))
                <div class="card border-left-success">
                    <div class="card-body">{!! $success !!}</div>
                </div>
            @endif

            <a href="{{ route('admin.librarians.create') }}"
                class="btn btn-primary d-block d-sm-inline-block my-3">Tambah</a>

            <x-admin.search url="{{ route('admin.librarians.index') }}" placeholder="Cari pustakawan..." />

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tipe Nomor</th>
                            <th>Nomor</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($librarians as $librarian)
                            <tr>
                                <td>{{ $librarian->name }}</td>
                                <td>{{ $librarian->number_type }}</td>
                                <td>{{ $librarian->number }}</td>
                                <td>+{{ $librarian->telephone }}</td>
                                <td>
                                    <a href="{{ route('admin.librarians.edit', $librarian) }}" class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('admin.librarians.destroy', $librarian) }}" method="POST"
                                        onsubmit="return confirm('Anda yakin ingin menghapus pustakawan ini?')" class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-5">
                    {{ $librarians->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
