<form wire:submit.prevent="save">
    <div>
        @if(session('status'))
            <div class="text-green-700 p-3 bg-green-300 rounded mb-3">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="mb-3">
        <label>目標</label>
        <br>
        <input type="text" class="border w-full p-1" wire:model="dairy_report.goal">
        @error('dairy_repot.goal')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-4">
        <label>成果</label>
        <br>
        <textarea rows="7" class="border w-full p-1" wire:model="dairy_report.results"></textarea>
        @error('dairy_report.results')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-4">
        <label>課題</label>
        <br>
        <textarea rows="7" class="border w-full p-1" wire:model="dairy_report.issue"></textarea>
        @error('dairy_report.issue')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-4">
        <label>次回までのプラン</label>
        <br>
        <textarea rows="7" class="border w-full p-1" wire:model="dairy_report.plan"></textarea>
        @error('dairy_report.plan')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>
    @if($dairy_report->exists)
        <button type="submit" class="bg-blue-700 text-blue-50 p-2 rounded">変更する</button>
    @else
        <button type="submit" class="bg-purple-700 text-purple-50 p-2 rounded">登録する</button>
    @endif
</form>