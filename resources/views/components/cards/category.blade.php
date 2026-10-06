@props(['category'])

<a href="{{ route('categories.show', $category->slug) }}" class="group relative block w-full aspect-4/5 rounded-none overflow-hidden bg-white isolate border border-steel-200 hover:border-primary-500 shadow-sm hover:shadow-xl transition-all duration-500 hover:-translate-y-1">
    {{-- Machine Image --}}
    <div class="absolute inset-0 p-6 pb-24 flex items-center justify-center bg-white">
        @if($category->hasMedia('images'))
            <img loading="lazy" src="{{ $category->getFirstMediaUrl('images') }}" 
                 alt="{{ $category->name }}" 
                 class="w-full h-full object-contain transition-transform duration-700 group-hover:scale-105">
        @else
            <div class="w-full h-full bg-steel-100 flex items-center justify-center text-steel-400"></div>
        @endif
    </div>
    
    <!-- Gradient Overlay at bottom for readable text -->
    <div class="absolute inset-x-0 bottom-0 h-3/5 bg-linear-to-t from-steel-950 via-steel-950/80 to-transparent z-10 pointer-events-none"></div>
    
    <!-- Content -->
    <div class="absolute inset-0 flex flex-col justify-between p-6 z-20">
        {{-- Code designation --}}
        <div class="self-end">
            <span class="bg-steel-950/90 border border-steel-800 px-2.5 py-1 font-mono text-[9px] text-primary-400 uppercase tracking-widest shadow-sm">[ CAT_{{ strtoupper(substr($category->slug ?? 'SYS', 0, 3)) }} ]</span>
        </div>
        
        <div>
            <h3 class="text-xl font-display font-extrabold text-white mb-2 uppercase tracking-tight group-hover:text-primary-400 transition-colors">
                {{ $category->name }}
            </h3>
            <p class="text-steel-300 text-xs line-clamp-2 mb-3 leading-relaxed">
                {{ $category->description }}
            </p>
            <div class="flex items-center text-primary-400 font-mono text-xs uppercase tracking-widest gap-2">
                Explore Range <svg aria-hidden="true" class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </div>
        </div>
    </div>
</a>