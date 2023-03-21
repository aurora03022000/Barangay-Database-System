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
        public splashScreenPage()
        {
            InitializeComponent();
            loading();
        }

        DispatcherTimer timer = new DispatcherTimer();

        private void timer_tick(object sender, EventArgs e)
        {
            timer.Stop();
            loginPage loginWindow = new loginPage();
            loginWindow.Show();
            this.Close();
            loading();
        }

        void loading()
        {
            timer.Tick += timer_tick;
            timer.Interval = new TimeSpan(0, 0, 15);
            timer.Start();
        }
    }
}
