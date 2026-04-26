<x-app-layout>
    <style>
        .faq-section {
            background: #ffffff;
            min-height: 100vh;
        }
        .faq-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 80px 20px;
        }
        .page-title {
            text-align: center;
            color: #333;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            font-family: 'Oswald', sans-serif;
        }
        .page-subtitle {
            text-align: center;
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 60px;
            font-family: 'Lato', sans-serif;
        }
        .faq-item {
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 10px;
            margin-bottom: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .faq-item:hover {
            background: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .faq-question {
            padding: 25px 30px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #333;
            font-size: 1.1rem;
            font-weight: 600;
            font-family: 'Lato', sans-serif;
            transition: all 0.3s ease;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
        }
        .faq-question:hover {
            color: #13C656;
        }
        .faq-question.active {
            color: #13C656;
            background: rgba(19, 198, 86, 0.1);
        }
        .faq-icon {
            font-size: 1.2rem;
            transition: transform 0.3s ease;
            color: #13C656;
        }
        .faq-icon.rotate {
            transform: rotate(180deg);
        }
        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, padding 0.3s ease;
            padding: 0 30px;
        }
        .faq-answer.show {
            max-height: 500px;
            padding: 0 30px 25px 30px;
        }
        .faq-answer-content {
            color: #666;
            line-height: 1.8;
            font-size: 1rem;
            font-family: 'Lato', sans-serif;
        }
        .breadcrumb {
            background: #f8f9fa;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 40px;
            border: 1px solid #e9ecef;
        }
        .breadcrumb-item {
            color: #666 !important;
        }
        .breadcrumb-item a {
            color: #13C656 !important;
            text-decoration: none;
        }
        .breadcrumb-item a:hover {
            color: #0fa84a !important;
        }
        .no-faqs {
            text-align: center;
            color: #666;
            font-size: 1.2rem;
            padding: 60px 20px;
        }
        @media (max-width: 768px) {
            .faq-container {
                padding: 60px 15px;
            }
            .page-title {
                font-size: 2rem;
            }
            .faq-question {
                padding: 20px;
                font-size: 1rem;
            }
            .faq-answer.show {
                padding: 0 20px 20px 20px;
            }
        }
    </style>
    
    <main class="faq-section">
        <div class="container">
            <div class="faq-container">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                    </ol>
                </nav>

                <!-- Page Title -->
                <h1 class="page-title">Frequently Asked Questions</h1>
                <p class="page-subtitle">Find answers to common questions about our products and services</p>

                <!-- FAQ Items -->
                @if($faqs->count() > 0)
                    <div class="faq-accordion">
                        @foreach($faqs as $index => $faq)
                            <div class="faq-item">
                                <button class="faq-question" onclick="toggleFaq({{ $index }})">
                                    <span>{{ $faq->question }}</span>
                                    <i class="fas fa-chevron-down faq-icon" id="faq-icon-{{ $index }}"></i>
                                </button>
                                <div class="faq-answer" id="faq-answer-{{ $index }}">
                                    <div class="faq-answer-content">
                                        {!! $faq->answer !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="no-faqs">
                        <i class="fas fa-question-circle fa-3x mb-3"></i>
                        <p>No FAQs available at the moment.</p>
                        <p>Please check back later or contact us for more information.</p>
                    </div>
                @endif
            </div>
        </div>
    </main>

    <script>
        function toggleFaq(index) {
            const answer = document.getElementById(`faq-answer-${index}`);
            const icon = document.getElementById(`faq-icon-${index}`);
            const question = answer.previousElementSibling;
            
            // Close all other FAQs
            document.querySelectorAll('.faq-answer').forEach((item, i) => {
                if (i !== index) {
                    item.classList.remove('show');
                    document.getElementById(`faq-icon-${i}`).classList.remove('rotate');
                    document.getElementById(`faq-icon-${i}`).parentElement.classList.remove('active');
                }
            });
            
            // Toggle current FAQ
            answer.classList.toggle('show');
            icon.classList.toggle('rotate');
            question.classList.toggle('active');
        }
    </script>
</x-app-layout>
