<?php
$questions = carbon_get_theme_option('calc_questions');
$services = carbon_get_theme_option('calc_services');

// Передаем данные услуг в JS
$services_data = [];
if (!empty($services)) {
    foreach ($services as $service) {
        $service_link = '';
        if (!empty($service['service_link']) && isset($service['service_link'][0])) {
            $service_link = get_permalink($service['service_link'][0]['id']);
        }
        $services_data[$service['slug']] = [
            'name' => $service['name'],
            'description' => $service['description'],
            'link' => $service_link,
        ];
    }
}
?>

<script>
    window.calcServicesData = <?php echo json_encode($services_data); ?>;
</script>

<section class="selection__params">
  <?php 
  if (!empty($questions)) :
      foreach ($questions as $q_index => $question) : 
  ?>
    <div class="selection__params-section" data-question="<?php echo $q_index; ?>">
      <h2 class="selection__params-title"><?php echo esc_html($question['question']); ?></h2>
      
      <div class="selection__params-grid selection__params-grid--two">
        <?php 
        if (!empty($question['answers'])) :
            foreach ($question['answers'] as $a_index => $answer) : 
        ?>
          <button 
            class="selection__param-btn" 
            data-question="<?php echo $q_index; ?>"
            data-service="<?php echo esc_attr($answer['service']); ?>"
            type="button"
          >
            <span class="selection__param-text"><?php echo esc_html($answer['text']); ?></span>
            <svg
              class="selection__param-icon"
              width="16"
              height="16"
              viewBox="0 0 16 16"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <circle cx="8" cy="8" r="7.5" stroke="white" stroke-opacity="0.3" />
              <circle
                cx="8"
                cy="8"
                r="5"
                fill="white"
                class="selection__param-icon-fill"
              />
            </svg>
          </button>
        <?php 
            endforeach;
        endif;
        ?>
      </div>
    </div>
  <?php 
      endforeach;
  else :
  ?>
    <p>Вопросы не настроены. Добавьте их в админке WordPress → Общие настройки → Калькулятор – Вопросы.</p>
  <?php endif; ?>
</section>
