@php
    Use \Carbon\Carbon;
@endphp
<div class="bg-primary p-2">
    <div class="media">
        <img src="{{ asset("storage/".$other->foto) }}" alt="" class="avatar-sm rounded ml-1 mr-2">
        <div class="media-body">
            <h5 class="font-size-13 text-white m-0">{{ $other->nama }}</h5>
            <small class="text-white-50"><i class="uil uil-circle font-size-11 text-success mr-1"></i>Active Now</small>
        </div>
        <div class="float-right font-size-18 mt-1">
            {{-- <a href="#" class="text-white mr-2"><i class="uil uil-comment-alt-notes font-size-16"></i></a> --}}
            <a href="#" class="chat-close text-white mr-2"><i class="uil uil-multiply font-size-14"></i></a>
        </div>
    </div>
</div>
<div class="chat-conversation p-2 ">
    <ul class="conversation-list slimscroll live{{ $other->id }}" id="show-chat-2" style="max-height: 220px;">
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
    </ul>
    <div class="position-relative chat-input">
        <textarea type="text" class="form-control text-chat" name="pesan" id="pesan" placeholder="Tulis Pesan..."></textarea>
        <div class="chat-link">
            <a href="#" class="p-1" id="kirim-chat" onclick="kirimChat({{ $other->id }})"><i class="uil-navigator"></i></a>
        </div>
    </div>
</div>
@include('auth.layouts.script')
{{-- $(document).ready(function() {
    setInterval(function() {
        $('.live<?= $other->id ?>').load('<?= "get-chat-2/".$other->id ?>')
    }, 1000);
}); --}}
<script>
    $('#show-chat-2').scrollTop($('#show-chat-2')[0].scrollHeight);
    $(document).ready(function() {
        $(".chat-close").click(function(c) {
            return c.preventDefault(), $(".chatbox").css({
                opacity: "0"
            }).hide(), !1
        })
    });

    function kirimChat(other_id) {
        var pesan = document.getElementById("pesan").value;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/chat/kirim-chat',
            data: {
                other_id: other_id,
                pesan: pesan
            },
            success: function(data) {
                $('#pesan').val('');
                $('#show-chat-2').html(data);
                $('#show-chat-2').scrollTop($('#show-chat-2')[0].scrollHeight);
            }
        });
    }

    function getCaret(el) {
        if (el.selectionStart) {
            return el.selectionStart;
        } else if (document.selection) {
            el.focus();
            var r = document.selection.createRange();
            if (r == null) {
                return 0;
            }
            var re = el.createTextRange(),
                rc = re.duplicate();
            re.moveToBookmark(r.getBookmark());
            rc.setEndPoint('EndToStart', re);
            return rc.text.length;
        }
        return 0;
    }

    $('.text-chat').keyup(function(event) {
        if (event.keyCode == 13) {
            var content = this.value;
            var caret = getCaret(this);
            if (event.shiftKey) {
                this.value = content.substring(0, caret - 1) + "\n" + content.substring(caret, content.length);
                event.stopPropagation();
            } else {
                this.value = content.substring(0, caret - 1) + content.substring(caret, content.length);
                $('#kirim-chat').click();
            }
        }
    });
</script>