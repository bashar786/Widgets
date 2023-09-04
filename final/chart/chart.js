const widgetChart = (el) => {
    return {
        init() {
          
          const ctx = el[0].querySelectorAll('.chart-finan');
          let pRadius = 8

          const smallDevice = window.matchMedia("(min-width: 768px)");

          smallDevice.addListener(handleDeviceChange);

          function handleDeviceChange(e) {
            if (e.matches) pRadius = 8;
            else pRadius = 2;
          }

   
          handleDeviceChange(smallDevice);

            const labels = [2002, 2003, 2004, 2005, 2006, 2007, 2008, 2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023];
            const data = {
              labels: labels,
              datasets: [
                {
                  label: 'Fitch',
                  data: [{x: 2002, y: 1}, {x: 2003, y: 3}, {x: 2004, y: 2}, {x: 2005, y: 5}, {x: 2006, y: 8}, {x: 2007, y: 4}, {x: 2008, y: 9}, {x: 2015, y: 7}, {x: 2023, y: 9}],
                  borderColor: '#DB383B',
                  borderWidth: 2,
                  backgroundColor: '#ffffff',
                  pointStyle: 'circle',
                  pointRadius: pRadius,
                  pointHoverRadius: pRadius
                },
                {
                  label: 'JCR',
                  data: [{x: 2002, y: 6}, {x: 2005, y: 7}, {x: 2008, y: 10}, {x: 2011, y: 2}, {x: 2012, y: 3}, {x: 2015, y: 8}, {x: 2020, y: 5}, {x: 2022, y: 6}, {x: 2023, y: 1}],
                  borderColor: '#E9C34E',
                  borderWidth: 2,
                  backgroundColor: '#ffffff',
                  pointStyle: 'circle',
                  pointRadius: pRadius,
                  pointHoverRadius: pRadius
                },
                {
                  label: 'Standard & Poors',
                  data: [{x: 2003, y: 2}, {x: 2004, y: 3}, {x: 2007, y: 1}, {x: 2010, y: 4}, {x: 2013, y: 6}, {x: 2016, y: 7}, {x: 2018, y: 5}, {x: 2020, y: 3}, {x: 2023, y: 5}],
                  borderColor: '#6487B8',
                  borderWidth: 2,
                  backgroundColor: '#ffffff',
                  pointStyle: 'circle',
                  pointRadius: pRadius,
                  pointHoverRadius: pRadius
                },
                {
                  label: 'Moody/s',
                  data: [{x: 2002, y: 3}, {x: 2003, y: 3}, {x: 2004, y: 4}, {x: 2005, y: 4}, {x: 2006, y: 5}, {x: 2007, y: 6}, {x: 2008, y: 7}, {x: 2010, y: 8}, {x: 2023, y: 10}],
                  borderColor: '#A2D46B',
                  borderWidth: 2,
                  backgroundColor: '#ffffff',
                  pointStyle: 'circle',
                  pointRadius: pRadius,
                  pointHoverRadius: pRadius
                },
              ]
            };

            let r = new Chart(ctx, {
              type: 'line',
              data: data,
              options: {
                clip: false,
                responsive: true,
                plugins: {
                  legend: {
                    position: 'top',
                    align: 'center',
                    labels: {
                      boxWidth: 7,
                      boxHeight: 7,
                      pointStyle: 'circle',
                      usePointStyle: true,
                      padding: 10,
                      font: {
                        size: 14
                      },
                      useBorderRadius: true
                    }
                  },
                  tooltip: {
                    callbacks: {
                      label: function(context) {
                          let label = context.dataset.label || '';
                        
                          switch (context.parsed.y) {
                              case 1:
                                  return `${label}: BB-/Ba3`;
                              case 2:
                                  return `${label}: BB/Ba2`;
                              case 3:
                                  return `${label}: BB+/Ba1`;
                              case 4:
                                  return `${label}: BBB/Baa3`;
                              case 5:
                                  return `${label}: BBB/Baa2`;
                              case 6:
                                  return `${label}: BBB/Baa1`;
                              case 7:
                                  return `${label}: A-/A3`;
                              case 8:
                                  return `${label}: A/A2`;
                              case 9:
                                  return `${label}: A+/A1`;
                              case 10:
                                  return `${label}: AA/Aa2`;
                          }
                      }
                    }
                  }
                },
                scales: {
                    x: {
                      grid: {
                        display: false
                      },
                      ticks: {
                        color: '#615E83', beginAtZero: true,
                        font: {
                          size: 14
                        },
                      }
                    },
                    y: {
                      min: 1,
                      max: 10,
                      ticks: {
                          color: '#615E83', beginAtZero: true,
                          font: {
                            size: 14
                          },
                          stepSize: 1,
                          callback: function(value, index, ticks) {
                              switch (value) {
                                  case 1:
                                      return 'BB-/Ba3';
                                  case 2:
                                      return 'BB/Ba2';
                                  case 3:
                                      return 'BB+/Ba1';
                                  case 4:
                                      return 'BBB/Baa3';
                                  case 5:
                                      return 'BBB/Baa2';
                                  case 6:
                                      return 'BBB/Baa1';
                                  case 7:
                                      return 'A-/A3';
                                  case 8:
                                      return 'A/A2';
                                  case 9:
                                      return 'A+/A1';
                                  case 10:
                                      return 'AA/Aa2';
                              }
                          }
                      }
                  }
                }
              },
            });
        }
    }
}
// con