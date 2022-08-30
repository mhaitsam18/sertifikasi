@php
    Use \Carbon\Carbon;
@endphp
@php
    $tanggal_lama = "";
    $tanggal_human_lama = "";
@endphp
@foreach ($data_chat as $chat)
    @php
        $tanggal_baru = Carbon::parse($chat->created_at)->translatedFormat('Y-m-d');
        $tanggal_human_baru = $chat->created_at->diffForHumans();
    @endphp
    @if ($tanggal_baru != $tanggal_lama)
        @if ($tanggal_human_baru != $tanggal_human_lama)
            @php
                $tanggal_human_lama = $tanggal_human_baru;
                $tanggal_lama = $tanggal_baru;
            @endphp
            @if($tanggal_baru == date('Y-m-d'))
                <li class="text-center">
                    <span class="badge badge-light-primary">Hari ini</span>
                </li>
            @elseif($tanggal_human_baru == "1 hari yang lalu")
                <li class="text-center">
                    <span class="badge badge-light-primary">Kemarin</span>
                </li>
            @else
                <li class="text-center">
                    <span class="badge badge-light-primary">{{ $chat->created_at->diffForHumans() }}</span>
                </li>
                <li class="text-center">
                    <span class="badge badge-light-primary">{{ Carbon::parse($chat->created_at)->translatedFormat('l, d/m/Y') }}</span>
                </li>
            @endif
        @else
            <li class="text-center">
                <span class="badge badge-light-primary">{{ Carbon::parse($chat->created_at)->translatedFormat('l, d/m/Y') }}</span>
            </li>
        @endif
    @endif
    @if ($chat->pengirim_id == $other->id)
        <li class="clearfix even">
            <div class="chat-avatar">
                <img src="{{ asset("storage/".$other->foto) }}" alt="male">
                <small>{{ date('H:i',strtotime($chat->created_at)) }}</small>
            </div>
            <div class="conversation-text">
                <div class="ctext-wrap d-block">
                    <div class="font-weight-medium">{{ $other->nama }}</div>
                    <p>
                        {{ $chat->pesan }}
                    </p>
                </div>
                <small class="d-block">
                    @if ($tanggal_baru == date('Y-m-d'))
                        {{ $chat->created_at->diffForHumans() }}
                    @endif
                </small>
            </div>
        </li>
    @else
        <li class="clearfix odd">
            <div class="conversation-text">
                <div class="ctext-wrap d-block">
                    <div class="font-weight-large text-bold">{{ $my->nama }}</div>
                    <p>
                        {{ $chat->pesan }}
                    </p>
                </div>
                <small class="d-block">
                    @if ($tanggal_baru == date('Y-m-d'))
                        {{ $chat->created_at->diffForHumans().', '.date('H:i',strtotime($chat->created_at)) }}
                    @else
                        {{ date('H:i',strtotime($chat->created_at)) }}
                    @endif
                </small>
            </div>
        </li>
        
    @endif
    
@endforeach
@include('auth.layouts.script')