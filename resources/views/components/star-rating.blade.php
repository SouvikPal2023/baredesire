<div>
    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
    @for ($i = 1; $i <= 5; $i++)
    @if ($rating >= $i)
        <i class="fas fa-star text-yellow-400"></i>
    @else
        <i class="far fa-star text-gray-300"></i>
    @endif
@endfor
</div>

