document.addEventListener('alpine:init', () => {
    Alpine.data('wizard', (initialStep = 1, totalSteps = 4) => ({
        step: initialStep,
        totalSteps: totalSteps,
        loading: false,
        errors: {},
        
        nextStep() {
            this.step++;
        },
        
        prevStep() {
            if (this.step > 1) {
                this.step--;
            }
        },
        
        async submitData(url, data) {
            this.loading = true;
            this.errors = {};
            
            try {
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(data)
                });
                
                const result = await response.json();
                
                if (!response.ok) {
                    if (response.status === 422) {
                        this.errors = result.errors;
                    }
                    return false;
                }
                
                return result;
            } catch (error) {
                console.error(error);
                return false;
            } finally {
                this.loading = false;
            }
        }
    }));
});
