<div>

    <table class="w-full text-sm mb-5">
        <thead>
        <tr>
            <th class="border p-2">レッスン日付</th>
            <th class="border p-2">目標</th>
            <th class="border p-2">成果</th>
            <th class="border p-2">課題</th>
            <th class="border p-2">次回までのプラン</th>
            <th class="border p-2">操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dairy_reports as $dairy_report)
            <tr>
                <td class="border px-2 py-1">{{ $dairy_report->lesson_date }}</td>
                <td class="border px-2 py-1">{{ $dairy_report->goal }}</td>
                <td class="border px-2 py-1">{{ $dairy_report->results }}</td>
                <td class="border px-2 py-1">{{ $dairy_report->issue }}</td>
                <td class="border px-2 py-1">{{ $dairy_report->plan }}</td>
                <td class="border px-2 py-1 text-right">
                    <button
                        type="button"
                        class="bg-yellow-500 text-yellow-50 rounded p-2 text-xs"
                        wire:click="$emitTo('dairy-report-input', 'edit', {{ $dairy_report->id }})">
                        変更
                    </button>
                    <button
                        type="button"
                        class="bg-red-600 text-red-50 rounded p-2 text-xs"
                        onClick="onDelete({{ $dairy_report->id }})">
                        削除
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $dairy_reports->links() }}

    <script>

        function onDelete(id) {

            if (confirm('削除します。よろしいですか？')) {
                Livewire.emitTo('dairy-report-list', 'destroy', id);
            }

        }

    </script>
</div>