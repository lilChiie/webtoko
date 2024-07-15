<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Document</title>
</head>

<body class="bg-red-200">


    <div class="flex flex-col items-center justify-center py-8">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-md sm:rounded-lg">
                    <table class="min-w-full text-left text-sm font-light text-gray-700 dark:text-white">
                        <thead class="border-b border-neutral-200 bg-red-300 font-medium dark:border-white/10 dark:bg-gray-800">
                            <tr>
                                <th scope="col" class="px-6 py-4">No</th>
                                <th scope="col" class="px-6 py-4">Nama Produk</th>
                                <th scope="col" class="px-6 py-4">Deskripsi Produk</th>
                                <th scope="col" class="px-6 py-4">Harga Produk</th>
                                <th scope="col" class="px-6 py-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nama as $index => $item)
                            <tr class="border-b border-neutral-200 bg-pink-100 dark:border-white/10 dark:bg-gray-700">
                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{$index + 1}}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{$item}}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{$desc[$index]}}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{$harga[$index]}}</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <form action="{{ route('produk.delete', $id[$index] )}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are tou sure you want to delete {{ $item }}?')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-400 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto py-8 mb-3 bg-red-300 rounded-md shadow-sm px-5 border border-pink-300">
        <h1 class="text-2xl font-bold  mb-4">Input Produk</h1>
        <form method="POST" action="{{ route('produk.simpan') }}">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" id="nama" name="nama" class="mt-1 block w-full p-2 bg-pink-50 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="3" class="mt-1 block w-full p-2 bg-pink-50 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
            </div>
            <div class="mb-4">
                <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" id="harga" name="harga" class="mt-1 block w-full p-2 bg-pink-50 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-400 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Simpan</button>
        </form>
    </div>

    @if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            Swal.fire({
                position: "middle",
                icon: "success",
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1500
            });
        });
    </script>
    @endif
</body>

</html>