 <script>var exports = {};</script>
 <script>function require() {};</script>

<script 
    src="{{ asset('/js/dashmix.app.js') }}?v=1"
    type="text/javascript">
</script>

<script 
    src="{{ asset('/js/dashmix.master.app.js') }}?v=1"
    type="text/javascript">
</script>

<script>
    jQuery(function(){ Dashmix.helpers(['layout']); });
</script>

<script 
    src="{{ asset('/js/laravel.app.js') }}?v=1"
    type="text/javascript">
</script>

{{--
    Custom Scripts
--}}


{{-- Loader Configuration --}}
<script
    src="{{ asset('/js/js-modules/components/loader.js') }}"
    type="text/javascript"
></script>
