<x-admin-layout title="List Member">
    <div class="card shadow mb-4">
        <div class="card-body">
            @if ($success = session()->get('success'))
                <div class="card border-left-success">
                    <div class="card-body">{!! $success !!}</div>
                </div>
            @endif

            <a href="{{ route('admin.members.create') }}"
                class="btn btn-primary d-block d-sm-inline-block my-3">Tambah</a>

            <x-admin.search url="{{ route('admin.members.index') }}" placeholder="Cari member..." />

            <div class="table-responsive">
                <table class="table table-striped align-middle text-nowrap">
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
                        @forelse ($members as $member)
                            <tr>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->number_type }}</td>
                                <td>{{ $member->number }}</td>
                                <td>+{{ $member->telephone }}</td>
                                <td>
                                    <a href="{{ route('admin.members.edit', $member) }}"
                                        class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('admin.members.destroy', $member) }}" method="POST"
                                        onsubmit="return confirm('Anda yakin ingin menghapus member ini?')" class="d-inline">
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
                    {{ $members->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
