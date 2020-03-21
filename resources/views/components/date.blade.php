@props(['date', 'format'])
<span
  x-data
  x-text="window.VH.formatDate({{ $date->getTimestamp() * 1000 }}, '{{ $format }}')"
  {{ $attributes }}
></span>

