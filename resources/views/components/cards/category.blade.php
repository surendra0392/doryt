@props(['category'])

<a href="{{ route('categories.show', $category->slug) }}" 
   class="group relative flex flex-col h-full bg-white rounded-none border border-steel-200/90 shadow-sm hover:shadow-2xl hover:border-primary-500/80 transition-all duration-500 hover:-translate-y-1.5 overflow-hidden">
    
    {{-- High-tech Corner Brackets --}}
    <div class="absolute top-0 left-0 w-3 h-3 border-t-2 border-l-2 border-steel-300 group-hover:border-primary-500 transition-colors duration-300 z-20"></div>
    <div class="absolute bottom-0 right-0 w-3 h-3 border-b-2 border-r-2 border-steel-300 group-hover:border-primary-500 transition-colors duration-300 z-20"></div>

    {{-- Top Technical Bar --}}
    <div class="flex items-center justify-between px-6 pt-5 pb-1 z-10">
        <span class="font-mono text-[10px] uppercase tracking-wider text-steel-600 flex items-center gap-1.5">
            <span class="w-1.5 h-1.5 bg-primary-500 rounded-full group-hover:animate-pulse"></span>
            CAT // {{ str_pad($category->sort_order ?? 1, 2, '0', STR_PAD_LEFT) }}
        </span>

        @if(isset($category->products_count) && $category->products_count > 0)
            <span class="font-mono text-[10px] uppercase tracking-wider text-steel-400">
                {{ $category->products_count }} Systems
            </span>
        @endif
    </div>

    {{-- Machine Image Showcase (Seamless, No Borders) --}}
    <div class="w-full h-56 flex items-center justify-center p-4">
        @if($category->hasMedia('images'))
            <img loading="lazy" 
                 src="{{ $category->getFirstMediaUrl('images') }}" 
                 alt="{{ $category->name }}" 
                 class="max-h-full max-w-full w-auto h-auto object-contain transition-transform duration-700 ease-out group-hover:scale-105">
        @else
            <div class="w-full h-full flex items-center justify-center text-steel-300">
                <svg aria-hidden="true" class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
        @endif
    </div>
    
    {{-- Card Content Area --}}
    <div class="p-6 pt-2 flex flex-col flex-1 bg-white">
        <span class="font-mono text-[10px] text-primary-600 font-bold uppercase tracking-wider block mb-2">
            SERIES // {{ strtoupper($category->slug) }}
        </span>

        <h3 class="text-xl font-display font-extrabold text-steel-950 uppercase tracking-tight group-hover:text-primary-600 transition-colors duration-300 leading-snug mb-3">
            {{ $category->name }}
        </h3>

        <p class="text-xs text-steel-600 leading-relaxed line-clamp-3 mb-6">
            {{ $category->description }}
        </p>

        {{-- Bottom Action Row --}}
        <div class="mt-auto pt-4 border-t border-steel-100 flex items-center justify-between">
            <span class="font-mono text-xs uppercase tracking-widest font-bold text-steel-900 group-hover:text-primary-600 transition-colors">
                Explore Range
            </span>
            <div class="w-8 h-8 flex items-center justify-center border border-steel-200 bg-steel-50 group-hover:bg-primary-600 group-hover:border-primary-600 text-steel-700 group-hover:text-white transition-all duration-300 rounded-none shadow-2xs">
                <svg aria-hidden="true" class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </div>
        </div>
    </div>

    {{-- Bottom Glow Bar --}}
    <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-transparent group-hover:bg-primary-500 transition-colors duration-300"></div>
</a>