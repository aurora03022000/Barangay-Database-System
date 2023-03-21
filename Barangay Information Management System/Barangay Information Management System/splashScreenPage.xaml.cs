using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;
using System.Windows.Threading;
using System.Data;
using System.Data.SqlClient;

namespace Barangay_Information_Management_System
{
    /// <summary>
    /// Interaction logic for splashScreenPage.xaml
    /// </summary>
    public partial class splashScreenPage : Window
    {
        int count = 0;

        public splashScreenPage()
        {
            InitializeComponent();
            loading();
        }

        DispatcherTimer timer = new DispatcherTimer();

        private void timer_tick(object sender, EventArgs e)
        {
            timer.Stop();

            if(count != 1)
            {
                loginPage loginWindow = new loginPage();
                loginWindow.Show();
                this.Close();
            }
            
        }

        void loading()
        {
            timer.Tick += timer_tick;
            timer.Interval = new TimeSpan(0, 0, 7);
            timer.Start();
        }

        /*private void Button_Click(object sender, RoutedEventArgs e)
        {
            count = 1;
            loginPage loginWindow = new loginPage();
            loginWindow.Show();
            this.Close();
        }*/
    }
}
